<?php
namespace NhaThieuNhi\Http\Controllers\Admin;

use Carbon\Carbon;
use NhaThieuNhi\Http\Controllers\Controller;
use NhaThieuNhi\Http\Requests\PostFormRequest;
use NhaThieuNhi\Post;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class PictureController extends Controller {
  /**
   * Display the listing of album pictures
   * @return Response
   */
  public function index() {
    $arrPicCates = $this->getAllPicCates();
    $datas = array();
    foreach($arrPicCates as $value) {
      $picFileName = $this->getLastPicFileNameByPicCateId($value->id) != null ? 
                      $this->getLastPicFileNameByPicCateId($value->id) : "";
      $totalPic = $this->getTotalPicByPicCateId($value->id);
      $datas[] = array(
          "pic_cate_id" => $value->id,
          "pic_cate_name" => $value->name,
          "pic_file_name" => $picFileName,
          "total_pic_by_cate" => $totalPic
      );
    }
    /* echo "<pre>";
    print_r($datas);
    echo "</pre>";
    exit(); */
    return view("picture.admin_index", compact("datas"));
  }
  /**
   * Show the form for creating a new resource
   */
  public function create() {
    return view("picture.admin_create");
  }
  
  public function upload() {
    $flagHasFile = false;
    if (isset($_FILES['files'])) {
      if ($_FILES['files']['name'][0] != "") {
        $flagHasFile = true;
      }
    }
    $errors= array();
    if ($_REQUEST["txt_name"] == "") {
      $errors["empty"] = "Vui lòng nhập tên album.";
      return view("picture.admin_create", compact("errors"));
    } else {
      // Insert to pic_cate
      $pic_cate_name = $_REQUEST["txt_name"];
      if ($_REQUEST["txt_des"]) {
        $description = $_REQUEST["txt_des"];
      } else {
        $description = "";
      }
      $created_at = "";
      $updated_at = "";
      $pic_cate_id = $this->insertPicCate($pic_cate_name, $description, $created_at, $updated_at);
      if ($flagHasFile) {
        $arrPics = [];
        $i = 0;
        foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ) {
          $file_name = $key.$_FILES['files']['name'][$key];
          $file_size =$_FILES['files']['size'][$key];
          $file_tmp =$_FILES['files']['tmp_name'][$key];
          $file_type=$_FILES['files']['type'][$key];
        
          if($file_size > 2097152){
            $errors[]='File size must be less than 2 MB';
          }
          $desired_dir= public_path() . "\uploads\album";
        
          if(empty($errors)==true) {
            if(is_dir($desired_dir)==false) {
              mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false) {
              move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            } else  {									// rename the file if another one exist
              $new_dir="$desired_dir/".$file_name.time();
              rename($file_tmp,$new_dir) ;
            }
            //mysql_query($query);
            $pic_name = $pic_cate_name . $i;
            $pic_description = "";
            $pic_file_name = $file_name;
            $arrPics[] = [
                "name" => $pic_name,
                "description" => $pic_description,
                "file_name" => $pic_file_name,
                "pic_cate_id" => $pic_cate_id,
                "created_at" => $created_at,
                "updated_at" => $updated_at
            ];
            $i++;
          }else{
            break;
          }
        }
        if(empty($errors)) {
          $this->insertPic($arrPics);
        }
      }
      return redirect()->action("Admin\PictureController@index");
    }
  }
  
  public function show() {
    return view("picture.admin_show");
  }
  
  public function edit($aPicCateId) {
    $picCate = $this->getPicCateById($aPicCateId);
    $errors = array();
    if (count($picCate) == 0) {
      $errors["emptyPicCate"] = "Album không hợp lệ";
      return view("picture.admin_index", compact("errors"));
    }
    $datas = array();
    $datas = array (
      "pic_cate_id" => $picCate[0]->id,
      "pic_cate_name" => $picCate[0]->name,
      "pic_cate_desc" => $picCate[0]->description,
    );
    $pics = $this->getAllPicsByPicCateId($aPicCateId);
    if (count($pics) > 0) {
      foreach ($pics as $pic) {
        $datas["file_names"][] = $pic->file_name;
      }
    }
    return view("picture.admin_edit", compact('datas'));
  }
  
  public function update($aPicCateId) {
    $flagHasFile = false;
    if (isset($_FILES['files'])) {
      if ($_FILES['files']['name'][0] != "") {
        $flagHasFile = true;
      }
    }
    $errors= array();
    if ($_REQUEST["txt_name"] == "") {
      $errors["empty"] = "Vui lòng nhập tên album.";
      return view("picture.admin_create", compact("errors"));
    } else {
      // Insert to pic_cate
      $pic_cate_id = $_REQUEST["h_pic_cate_id"];
      $pic_cate_name = $_REQUEST["txt_name"];
      if ($_REQUEST["txt_des"]) {
        $description = $_REQUEST["txt_des"];
      } else {
        $description = "";
      }
      $created_at = "";
      $updated_at = "";
      $this->updatePicCate($pic_cate_id, $pic_cate_name, $description);
      if ($flagHasFile) {
        $arrPics = [];
        $i = 0;
        foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ) {
          $file_name = $key.$_FILES['files']['name'][$key];
          $file_size =$_FILES['files']['size'][$key];
          $file_tmp =$_FILES['files']['tmp_name'][$key];
          $file_type=$_FILES['files']['type'][$key];
    
          if($file_size > 2097152){
            $errors[]='File size must be less than 2 MB';
          }
          $desired_dir= public_path() . "\uploads\album";
    
          if(empty($errors)==true) {
            if(is_dir($desired_dir)==false) {
              mkdir("$desired_dir", 0700);		// Create directory if it does not exist
            }
            if(is_dir("$desired_dir/".$file_name)==false) {
              move_uploaded_file($file_tmp,"$desired_dir/".$file_name);
            } else  {									// rename the file if another one exist
              $new_dir="$desired_dir/".$file_name.time();
              rename($file_tmp,$new_dir) ;
            }
            //mysql_query($query);
            $pic_name = $pic_cate_name . $i;
            $pic_description = "";
            $pic_file_name = $file_name;
            $arrPics[] = [
                "name" => $pic_name,
                "description" => $pic_description,
                "file_name" => $pic_file_name,
                "pic_cate_id" => $pic_cate_id,
                "created_at" => $created_at,
                "updated_at" => $updated_at
            ];
            $i++;
          }else{
            break;
          }
        }
        if(empty($errors)) {
          $this->insertPic($arrPics);
        }
      }
      return redirect()->action("Admin\PictureController@index");
    }
  }
  
  public function destroy($aPicCateId) {
    $desired_dir= public_path() . "\uploads\album";
    $pics = $this->getAllPicsByPicCateId($aPicCateId);
    if (count($pics) > 0) {
      foreach ($pics as $pic) {
        $picId = $pic->id;
        $fileName = $pic->file_name;
        $this->deletePic($picId);
        unlink($desired_dir . "/" . $fileName);
      }
    }
    $this->deletePicCate($aPicCateId);
    return redirect()->action("Admin\PictureController@index");
  }
  
  private function getAllPicCates() {
    $picCates = \DB::table("pic_cate")->orderBy("id", "desc")->get();
    return $picCates;
  }
  
  private function getPicCateById($aId) {
    $picCate = \DB::table("pic_cate")->where("id", $aId)->get();
    return $picCate;
  }
  
  private function getAllPicsByPicCateId($aPicCateId) {
    $pics = \DB::table("pic")->where("pic_cate_id", $aPicCateId)->get();
    return $pics;
  }
  
  private function getPicById($aId) {
    $pic = \DB::table("pic")->where("id", $aId);
    return $pic;
  }
  
  private function getLastPicFileNameByPicCateId($aPicCateId) {
    $file_name = \DB::table("pic")->select("file_name")->where("pic_cate_id", $aPicCateId)->orderBy("id", "desc")->first();
    return $file_name;
  }
  
  private function getTotalPicByPicCateId($aPicCateId) {
    $total = \DB::table("pic")->where("pic_cate_id", $aPicCateId)->count();
    return $total;
  }
  
  private function insertPicCate($aName, $aDescription, $aCreatedAt, $aUpdatedAt) {
    $pic_cate_id = \DB::table("pic_cate")->insertGetId(
      ["name"=>$aName, "description"=>$aDescription, "created_at"=>$aCreatedAt, "updated_at"=>$aUpdatedAt]
    );
    return $pic_cate_id;
  }
  
  private function updatePicCate($aPicCateId, $aName, $aDescription) {
    \DB::table("pic_cate")->where("id", $aPicCateId)
                          ->update(["name"=>$aName, "description"=>$aDescription]);
  }
  
  private function deletePicCate($aPicCateId) {
    \DB::table("pic_cate")->where("id", $aPicCateId)
                          ->delete();
  }
  
  private function insertPic($aPics) {
    \DB::table("pic")->insert($aPics);
  }
  
  private function deletePic($aPicId) {
    \DB::table("pic")->where("id", $aPicId)->delete();
  }
}