<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeController extends Controller{
    public function index(Request $request){
        $url = 'https://dummy.restapiexample.com/api/v1/employees';
        $headers = ['Accept' => 'application/json'];
        // inisiasi curl
        $ch = curl_init();
        // menampilkan response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // exec
        $result = curl_exec($ch);
        // tutup curl
        curl_close($ch);

        $response = json_decode($result, true);
        // dd($response);

        return view ('employees/index', compact('response'));
    }

    public function show($id){
        $url = 'https://dummy.restapiexample.com/api/v1/employee/'.$id;
        $headers = ['Accept' => 'application/json'];
        // inisiasi curl
        $ch = curl_init();
        // menampilkan response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // exec
        $result = curl_exec($ch);
        // tutup curl
        curl_close($ch);

        $response = json_decode($result, true);
        // dd($response);

        return view ('employees/show', compact('response'));
    }

    public function create(){
        return view ('employees/create');
    }

    public function store(Request $request){
        $url = 'hhttps://dummy.restapiexample.com/api/v1/create';
        $headers = ['Accept' => 'application/json'];
        $data = [
            'id' => $request->id,
            'name' => $request->employee_name,
            'salary' => $request->employee_salary,
            'age' => $request->employee_age,
            'profile_image' => $request->profile_image
        ];
        // inisiasi curl
        $ch = curl_init();
        // menampilkan response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // set method post
        curl_setopt($ch, CURLOPT_POST, true);
        // set data post
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // exec
        $result = curl_exec($ch);
        // tutup curl
        curl_close($ch);

        $response = json_decode($result, true);
        // dd($response);
    }

    public function edit($id){
        $url = 'https://dummy.restapiexample.com/api/v1/employee/'.$id;
        $headers = ['Accept' => 'application/json'];
        // inisiasi curl
        $ch = curl_init();
        // menampilkan response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // exec
        $result = curl_exec($ch);
        // tutup curl
        curl_close($ch);

        $employee = json_decode($result, true);
        $employee = $employee['data'];
    
        // dd($employee);

        return view ('employees/edit', compact('employee'));
    }

    public function update(Request $id,$request){
        $url = 'https://dummy.restapiexample.com/api/v1/update/'.$id;
        $headers = ['Accept' => 'application/json'];
        $data = [
            'id' => $request->id,
            'name' => $request->employee_name,
            'salary' => $request->employee_salary,
            'age' => $request->employee_age,
            'profile_image' => $request->profile_image
        ];
        // inisiasi curl
        $ch = curl_init();
        // menampilkan response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // set url
        curl_setopt($ch, CURLOPT_URL, $url);
        // set header
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // set method post
        curl_setopt($ch, CURLOPT_POST, true);
        // set data post
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // exec
        $result = curl_exec($ch);
        // tutup curl
        curl_close($ch);

        $response = json_decode($result, true);
        // dd($response);
    }

public function destroy($id){
    $url = 'https://dummy.restapiexample.com/api/v1/delete/'.$id;
    $headers = ['Accept' => 'application/json'];
    // inisiasi curl
    $ch = curl_init();
    // menampilkan response
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    // set url
    curl_setopt($ch, CURLOPT_URL, $url);
    // set header
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    // set method delete
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    // exec
    $result = curl_exec($ch);
    // tutup curl
    curl_close($ch);

    $response = json_decode($result, true);
    // dd($response);
}
}