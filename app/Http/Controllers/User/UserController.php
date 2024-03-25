<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {

        return view('admin.user.view');
    }

    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:3000',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // $input = $request->all();
        // $input['password'] = Hash::make($input['password']);
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->id_card = $request->id_card;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $user->image = $imageName;
        }

        $user->save(); // Save the user first

        // Assuming $request->input('roles') contains an array of role IDs
        $roles = $request->input('roles');
        $user->assignRole($roles);

        return redirect()->route('users.index')->with('success', 'User has been Added successfully!');
    }

    public function get_users(Request $request)
    {

        $result = User::orderBy('created_at', 'DESC');

        $aColumns = ['name', 'email', 'id_card', 'phone', 'role'];

        $iStart = $request->get('iDisplayStart');
        $iPageSize = $request->get('iDisplayLength');

        $order = 'created_at';
        $sort = ' DESC';

        if ($request->get('iSortCol_0')) {

            $sOrder = "ORDER BY  ";

            for ($i = 0; $i < intval($request->get('iSortingCols')); $i++) {
                if ($request->get('bSortable_' . intval($request->get('iSortCol_' . $i))) == "true") {
                    $sOrder .= $aColumns[intval($request->get('iSortCol_' . $i))] . " " . $request->get('sSortDir_' . $i) . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = " id ASC";
            }

            $OrderArray = explode(' ', $sOrder);
            $order = trim($OrderArray[3]);
            $sort = trim($OrderArray[4]);
        }

        $sKeywords = $request->get('sSearch');
        if ($sKeywords != "") {

            $result->Where(function ($query) use ($sKeywords) {
                $query->orWhere('name', 'LIKE', "%{$sKeywords}%");;
                $query->orWhere('email', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('id_card', 'LIKE', "%{$sKeywords}%");
                $query->orWhere('phone', 'LIKE', "%{$sKeywords}%");
            });
        }

        for ($i = 0; $i < count($aColumns); $i++) {
            $request->get('sSearch_' . $i);
            if ($request->get('bSearchable_' . $i) == "true" && $request->get('sSearch_' . $i) != '') {
                $result->orWhere($aColumns[$i], 'LIKE', "%" . $request->orWhere('sSearch_' . $i) . "%");
            }
        }

        $iFilteredTotal = $result->count();

        if ($iStart != null && $iPageSize != '-1') {
            $result->skip($iStart)->take($iPageSize);
        }

        $result->orderBy($order, trim($sort));
        $result->limit($request->get('iDisplayLength'));
        $linksData = $result->get();

        $iTotal = $iFilteredTotal;
        $output = array(
            "sEcho" => intval($request->get('sEcho')),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array(),
        );
        $i = 0;

        foreach ($linksData as $aRow) {

            $checkbox = "<label class=\"mt-checkbox mt-checkbox-single mt-checkbox-outline\">
                             <input type=\"checkbox\" class=\"checkbox-index\" value=\"{$aRow->id}\">
                             <span></span>
                          </label>";

            $hotel_id = $aRow->id;
            $first_name = $aRow->first_name;
            $last_name = $aRow->last_name;
            $email = $aRow->email;
            $id_card = $aRow->id_card;
            $designation = $aRow->designation;
            $role = $aRow->getRoleNames();
            $phone = $aRow->phone;
            $address = $aRow->address;

            $action = "<span class=\"dropdown\">
                          <button id=\"btnSearchDrop2\" type=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\"
                          aria-expanded=\"false\" class=\"btn btn-info btn-sm dropdown-toggle\"><i class=\"la la-cog font-medium-1\"></i></button>
                          <span aria-labelledby=\"btnSearchDrop2\" class=\"dropdown-menu mt-1 dropdown-menu-right\">
                            <a href=\"users/{$aRow->id}/edit\" class=\"dropdown-item font-small-3\"><i class=\"la la-barcode font-small-3\"></i> edit</a>
                            <a href=\"#\" onClick=\"deleteUser({$aRow->id})\"  class=\"dropdown-item font-small-3\"><i class=\"la la-repeat font-small-3\"></i> delete</a>
                          </span>
                        </span>
                        ";

            $output['aaData'][] = array(
                "DT_RowId" => "row_{$aRow->id}",
                @$last_name,
                @$email,
                @$id_card,
                @$phone,
                @$role,
                @$action,
            );

            $i++;
        }
        echo json_encode($output);
    }

    public function edit($id)
    {
        $route = User::findOrFail($id);
        $roles = Role::pluck('name', 'name')->all();
        return view('admin.user.edit', compact('route'), compact('roles'));
    }

    public function update(Request $request, string $id)
    {

        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:3000',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::findOrFail($id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->id_card = $request->id_card;
        $user->designation = $request->designation;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->email = $request->email;
        if ($request->password != null) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);
            $user->image = $imageName;
        }
        $user->save(); // Save the user first
        // Assuming $request->input('roles') contains an array of role IDs
        $roles = $request->input('roles');
        $user->roles()->detach();
        $user->assignRole($roles);

        return redirect()->route('users.index')->with('success', 'User has been Updated successfully!');
    }

    public function destroy($id)
    {
        $hotel = User::findOrFail($id);
        $imagePath = public_path('uploads');
        $imageFileName = $hotel->image; // Assuming the image file name is stored in the 'image' column
        if ($imageFileName && file_exists($imagePath . '/' . $imageFileName)) {
            unlink($imagePath . '/' . $imageFileName);
        }
        $hotel->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'User deleted successfully.',
        ], 200);

        return view('website.user.dashboard');
    }

    public function simple_profile()
    {
        return view('website.user.simple-profile.index');
    }

    public function detail_profile()
    {
        $user = Auth::user();

        $professional_skills = json_decode($user->professional_skills);
        if (empty(json_decode($user->interpersonal_skills))) {
            $interpersonal_skills = array();
        } else {
            $interpersonal_skills = json_decode($user->interpersonal_skills);
        }

        if (empty(json_decode($user->professional_skills))) {
            $professional_skills = array();
        } else {
            $professional_skills = json_decode($user->professional_skills);
        }

        $careerBackgrounds = $user->careerBackgrounds;
        $personalizedBackgrounds = $user->personalizedBackgrounds;
        $qualifications = $user->qualifications;

        return view('website.user.detail-profile.index', compact('user', 'careerBackgrounds', 'professional_skills', 'interpersonal_skills', 'personalizedBackgrounds', 'qualifications'));
    }

    public function edit_simple_profile()
    {
        $user = Auth::user();

        return view('website.user.simple-profile.edit', compact('user'));
    }

    public function simple_profile_settings()
    {
        $user = Auth::user();

        return view('website.user.simple-profile.account-setting', compact('user'));
    }

    public function store_detail_profile(Request $request)
    {
        return $request;
    }

    public function update_simple_profile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->location = $request->location;

        if ($request->has('image')) {
            if (isset($user->image)) {
                @unlink('storage/user_image/' . $user->image);
            }

            $image = $request->file('image');
            $user_image = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/user_image');
            $image->move($destinationPath, $user_image);
            $user->image = $user_image;

        }

        $user->save();

        return redirect()->route('user.simple.profile')->with('success', "Simple Profile Updated Successfully");
    }

    public function resume()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $professionalSkills = json_decode($user->professional_skills);
        $profSkills = explode(",", $professionalSkills[0]);
        $interpersonalSkills = json_decode($user->interpersonal_skills);
        $intpersonalSkills = explode(",", $interpersonalSkills[0]);

        return view('website.user.resume.index', compact('profSkills', 'intpersonalSkills'));
    }

    public function update_profile_settings(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $hashedPassword = $user->password;

        if (isset($request->password)) {
            if ($this->checkPassword($request->current_password, $hashedPassword) == true) {
                $user->password = Hash::make($request->password);
            } else {
                return redirect()->back()->with('error', "Your current password is incorrect");
            }
        }

        if ($request->is_active == "on") {
            $user->is_active = 1;
        } else {
            $user->is_active = 0;
        }

        $user->save();

        return redirect()->back()->with('success', "Your settings has been updated Successfully");
    }

    public function checkPassword($current_password, $hashedPassword)
    {
        if (Hash::check($current_password, $hashedPassword)) {
            return true;
        } else {
            return false;
        }

    }
}
