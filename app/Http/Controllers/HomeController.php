<?php

/**
 * @author: Tien Nguyen
 * @version: $Id: HomeController.php,v 1.0 2015/05/27 03:14 htien Exp $
 */

namespace NhaThieuNhi\Http\Controllers;

class HomeController extends Controller
{
  public function index()
  {
      // Get last posts
      $tthd = $this->_getPostsByTaxonomy('category', 'publish', 'hoat-dong')
                   ->take(3)
                   ->get();

      $pb = $this->_getPostsByTaxonomy('category', 'publish', 'phong')
                 ->take(3)
                 ->get();

      $hdttn = $this->_getPostsByTaxonomy('category', 'publish', 'hoat-dong-ttn')
                    ->take(3)
                    ->get();

      $gmn = $this->_getPostsByTaxonomy('category', 'publish', 'goc-mang-non')
                  ->take(3)
                  ->get();
      
      // right vertical album slide
      $arrPic = array();
      $lastPicCateId = $this->getLastPicCateId();
      if ($lastPicCateId != null) {
        $pics = $this->getAllPicsByPicCateId($lastPicCateId);
        foreach ($pics as $val) {
          $arrPic[] = array(
            "id" => $val->id,
            "name" => $val->name,
            "description" => $val->description,
            "fileName" => $val->file_name 
          );
        }
      } else {
        $lastPicCateId = "";
      }

      return view('home.index', compact('tthd', 'pb', 'hdttn', 'gmn', 'lastPicCateId', 'arrPic'));
  }

  public function page($page)
  {
      $pages = [
          'chao-mung'  => [
              'name'     => 'welcome',
              'template' => 'pages.welcome'
          ],
          'gioi-thieu' => [
              'name'     => 'intro',
              'template' => 'pages.intro'
          ],
          'lien-he'    => [
              'name'     => 'contact',
              'template' => 'pages.contact'
          ],
          'lich-hoc'   => [
              'name'     => 'schedule',
              'template' => 'pages.schedule'
          ],
          'chieu-sinh' => [
              'name'     => 'enrolstudents',
              'template' => 'pages.enrolstudents'
          ]
      ];

      if (! isset($pages[ $page ])) {
          return response()->view("errors.404", ['exception' => NULL], 404);
      }

      return view($pages[ $page ]['template']);
  }

  /**
   * @param $taxonomy
   * @param $status
   * @param $slug
   *
   * @return mixed
   */
  private function _getPostsByTaxonomy($taxonomy, $status, $slug)
  {
      return \DB::table('posts as p')
                ->join('post_taxonomy as pt', 'pt.object_id', '=', 'p.id')
                ->join('term_taxonomy as tt', 'tt.id', '=', 'pt.term_taxonomy_id')
                ->join('terms as t', 't.id', '=', 'tt.term_id')
                ->leftJoin('users as u', 'u.id', '=', 'p.post_author')
                ->distinct()
                ->select(
                    'p.id',
                    'p.post_date',
                    'p.post_title',
                    'p.post_excerpt',
                    'p.post_name',
                    'p.post_avatar',
                    'p.updated_at',
                    't.id as term_id',
                    't.term_name',
                    't.term_slug',
                    'u.id as author_id',
                    'u.name as author_name'
                )
                ->where([
                    'p.deleted_at'  => NULL,
                    'p.post_type'   => 'post',
                    'p.post_status' => $status,
                    'tt.taxonomy'   => $taxonomy,
                ])
                ->where(function ($q) use ($slug) {
                    $q->where('t.term_slug', '=', $slug)
                      ->orWhere('t.term_slug', 'like', \DB::raw("'$slug/%'"));
                })
                ->orderBy('p.id', 'DESC');
  }
  
  public function album($pic_cate_id) {
    $picCate = $this->getPicCateById($pic_cate_id);
    $picCate = $picCate[0];
    $allPicCates = $this->getAllPicCates();
    $arrAllPicCates = array();
    foreach ($allPicCates as $val) {
      $lastFileName = $this->getLastPicFileNameByPicCateId($val->id);
      if ($lastFileName != null) {
        $arrAllPicCates[] = array(
          "id"=>$val->id,
          "name"=>$val->name,
          "lastFileName"=>$lastFileName->file_name
        );
      } else {
        break;
      }
    }
    $pics = $this->getAllPicsByPicCateId($pic_cate_id);
    $arrPic = array();
    foreach ($pics as $val) {
      $arrPic[] = array(
          "id" => $val->id,
          "name" => $val->name,
          "description" => $val->description,
          "fileName" => $val->file_name
      );
    }
    return view("album.index", compact("arrPic", "picCate", "arrAllPicCates"));
  }
  
  private function getAllPicCates() {
    $picCates = \DB::table("pic_cate")->orderBy("id", "desc")->get();
    return $picCates;
  }
  
  private function getPicCateById($aId) {
    $picCate = \DB::table("pic_cate")->where("id", $aId)->get();
    return $picCate;
  }
  
  private function getLastPicCateId() {
    $lastPicCateId = \DB::table("pic_cate")->select("id")->orderBy("id", "desc")->first();
    if ($lastPicCateId == null) {
      return null;
    }
    return $lastPicCateId->id;
  }
  
  private function getLastPicFileNameByPicCateId($aPicCateId) {
    $file_name = \DB::table("pic")->select("file_name")->where("pic_cate_id", $aPicCateId)->orderBy("id", "desc")->first();
    return $file_name;
  }
  
  private function getAllPicsByPicCateId($aPicCateId) {
    $pics = \DB::table("pic")->where("pic_cate_id", $aPicCateId)->get();
    return $pics;
  }
}
