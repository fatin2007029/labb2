<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Party;
use Illuminate\Support\Facades\DB;

class AppController extends Controller
{
   public function index(){
    
    

    return view('dashboard');

   }

   public function about(){
    /*$jame = "Fatin";
    $phone = "01962579496";
    $city="Dhaka";*/

    #using compact
   //return view('about', compact("jame", "phone", "city"));

   #using associative array
  /* return view('about', array(
    'jame1'=> $jame,
    'phone'=> $phone,
    'city'=> $city,
    
   ));
   */

   #using with method
  /* return view('about')->with('jame', $jame)
   ->with('phone', $phone)
   ->with('city', $city); 
   */

   /*$data['jame']="Fatin";
   $data['phone']="01962579496";
   $data['city']="Dhaka";
   return view('about', $data);*/

   return view('about');
   }

   //Function for soft deletion

   public function delete($table, $id)
   {
    $param = array('is_deleted' => 1);
    DB::table($table)->where('id', $id)->update($param);

    
        // Redirect back
        return redirect()->back()->withStatus("Record deleted successfully");

   }
}
