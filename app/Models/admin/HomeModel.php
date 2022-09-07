<?php

namespace App\Models\admin;

use CodeIgniter\Model;
use \Hermawan\DataTables\DataTable;

class HomeModel extends Model
{
    public function insert_edit_brand($post,$file)
    {
        $db = $this->db;
        $builder = $db->table('brand');
        $builder->select('*');
        $builder->where(array('id' => $post['id']));
        $query = $builder->get();
        $result = $query->getRowArray();
        $pdata = array(
            'brand' => $post['brand'],
        );
        if (isset($file)) {
            //  print_r($file);exit;
            if ($file->isValid() && !$file->hasMoved()) {
                $originalPath = '/brand/' . date('Ymd') . '/';
                if (!file_exists(getcwd() . $originalPath)) {
                    mkdir(getcwd() . $originalPath, 0777, true);
                }
                $newName = $file->getRandomName();
                $file->move(getcwd() . $originalPath, $newName);
                $pdata['image'] = $originalPath . $newName;
            }
        }
        if (!empty($result)) {
            $pdata['updated_at'] = date('Y-m-d H:i:s');
            $pdata['updated_by'] = session('id');
            $builder->where('id', $post['id']);
            $res = $builder->update($pdata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Update successfully');
            } else {
                $msg = array('st' => 'failed');
            }
        } else {
            $pdata['created_at'] = date('Y-m-d H:i:s');
            $pdata['created_by'] = session('id');
            $res = $builder->insert($pdata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Insert successfully');
            } else {
                $msg = array('st' => 'failed');
            }
        }
        return $msg;
    }
    public function insert_edit_category($post,$file){
        $db = $this->db;
        $builder = $db->table('category');
        $builder->select('*');
        $builder->where(array('id' => $post['id']));
        $query = $builder->get();
        $result = $query->getRowArray();
        $pdata = array(
            'category' => $post['category'],
        );
        if (isset($file)) {
            //  print_r($file);exit;
            if ($file->isValid() && !$file->hasMoved()) {
                $originalPath = '/category/' . date('Ymd') . '/';
                if (!file_exists(getcwd() . $originalPath)) {
                    mkdir(getcwd() . $originalPath, 0777, true);
                }
                $newName = $file->getRandomName();
                $file->move(getcwd() . $originalPath, $newName);
                $pdata['image'] = $originalPath . $newName;
            }
        }
        if (!empty($result)) {
            $pdata['updated_at'] = date('Y-m-d H:i:s');
            $pdata['updated_by'] = session('id');
            $builder->where('id', $post['id']);
            $res = $builder->update($pdata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Update successfully');
            } else {
                $msg = array('st' => 'failed');
            }
        } else {
            $pdata['created_at'] = date('Y-m-d H:i:s');
            $pdata['created_by'] = session('id');
            $res = $builder->insert($pdata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Insert successfully');
            } else {
                $msg = array('st' => 'failed');
            }
        }
        return $msg;
    }
    public function insert_edit_slider($post,$file){
        $db = $this->db;
        $builder = $db->table('slider');
        $builder->select('*');
        $builder->where(array('id' => $post['id']));
        $query = $builder->get();
        $result = $query->getRowArray();
        //   print_r($result);exit;
        $pdata = array(
            'slider' => $post['slider'],
            'link' => $post['link']
        );
        if (isset($file)) {
            //  print_r($file);exit;
            if ($file->isValid() && !$file->hasMoved()) {
                $originalPath = '/slider/' . date('Ymd') . '/';
                if (!file_exists(getcwd() . $originalPath)) {
                    mkdir(getcwd() . $originalPath, 0777, true);
                }
                $newName = $file->getRandomName();
                $file->move(getcwd() . $originalPath, $newName);
                $pdata['image'] = $originalPath . $newName;
            }
        }
        if (!empty($result)) {
            $pdata['updated_at'] = date('Y-m-d H:i:s');
            $pdata['updated_by'] = session('id');
            // print_r($result);exit;
            $builder->where('id', $post['id']);
            $res = $builder->update($pdata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Update successfully');
            } else {
                $msg = array('st' => 'failed');
            }
        } else {
            $pdata['created_at'] = date('Y-m-d H:i:s');
            $pdata['created_by'] = session('id');
            $res = $builder->insert($pdata);
            if ($res) {
                $msg = array('st' => 'success', 'msg' => 'Insert successfully');
            } else {
                $msg = array('st' => 'failed');
            }
        }
        return $msg;
    }
    
    public function get_brand_data()
    {
        $db = $this->db;
        $builder = $db->table('brand');
        $builder->select('id,brand,image');
        $builder->where('is_delete', 0);
        $data_table =  DataTable::of($builder);
        $data_table->setSearchableColumns(['id', 'brand']);
        $data_table->edit('image', function ($row) {
            $img_tag = '';
            $img_tag .= '<img src=" ' . $row->image . ' " width="100" height="100">';
            return $img_tag;
        });
        $data_table->add('action', function ($row) {
            $btnedit = '<a data-toggle="modal" data-target="#fm_model" href="' . url('admin/Home/createbrand/') . $row->id . '" data-title="Edit Brand : ' . $row->brand . '"  class="btn btn-link pd-10"><i class="far fa-edit"></i></a> ';

            $btndelete = '<a data-toggle="modal" target="_blank"   title="Brand name: ' . $row->brand . '"  onclick="editable_remove(this)"  data-val="' . $row->id . '"  data-pk="' . $row->id . '" tabindex="-1" class="btn btn-link"><i class="far fa-trash-alt"></i></a> ';
            return $btnedit . $btndelete;
        }, 'last');

        return $data_table->toJSON();
    }
    public function get_category_data()
    {
        $db = $this->db;
        $builder = $db->table('category');
        $builder->select('id,category,image');
        $builder->where('is_delete', 0);
        $data_table =  DataTable::of($builder);
        $data_table->setSearchableColumns(['id', 'category']);
        $data_table->edit('image', function ($row) {
            $img_tag = '';
            $img_tag .= '<img src=" ' . $row->image . ' " width="100" height="100">';
            return $img_tag;
        });
        $data_table->add('action', function ($row) {
            $btnedit = '<a data-toggle="modal" data-target="#fm_model" href="' . url('admin/Home/createcategory/') . $row->id . '" data-title="Edit Category : ' . $row->category . '"  class="btn btn-link pd-10"><i class="far fa-edit"></i></a> ';

            $btndelete = '<a data-toggle="modal" target="_blank"   title="Category name: ' . $row->category . '"  onclick="editable_remove(this)"  data-val="' . $row->id . '"  data-pk="' . $row->id . '" tabindex="-1" class="btn btn-link"><i class="far fa-trash-alt"></i></a> ';
            return $btnedit . $btndelete;
        }, 'last');

        return $data_table->toJSON();
    }
    public function get_slider_data()
    {
        $db = $this->db;
        $builder = $db->table('slider');
        $builder->select('id,slider,image,link');
        $builder->where('is_delete', 0);
        $data_table =  DataTable::of($builder);
        $data_table->setSearchableColumns(['id', 'slider']);
        $data_table->edit('image', function ($row) {
            $img_tag = '';
            $img_tag .= '<img src=" ' . $row->image . ' " width="100" height="100">';
            return $img_tag;
        });
        $data_table->add('action', function ($row) {
            $btnedit = '<a data-toggle="modal" data-target="#fm_model" href="' . url('admin/Home/createslider/') . $row->id . '" data-title="Edit Slider : ' . $row->slider . '"  class="btn btn-link pd-10"><i class="far fa-edit"></i></a> ';

            $btndelete = '<a data-toggle="modal" target="_blank"   title="Slider name: ' . $row->slider . '"  onclick="editable_remove(this)"  data-val="' . $row->id . '"  data-pk="' . $row->id . '" tabindex="-1" class="btn btn-link"><i class="far fa-trash-alt"></i></a> ';
            return $btnedit . $btndelete;
        }, 'last');

        return $data_table->toJSON();
    }
    public function get_item_data()
    {
        $db = $this->db;
        $builder = $db->table('item');
        $builder->select('id,brand,category,name,image,price,listedprice,discount,stock');
        $builder->where('is_delete', 0);
        $data_table =  DataTable::of($builder);
        $data_table->setSearchableColumns(['id', 'item']);
        $data_table->edit('image', function ($row) {
            $img_tag = '';
            $img_tag .= '<img src=" ' . $row->image . ' " width="100" height="100">';
            return $img_tag;
        });
        $data_table->add('action', function ($row) {
            $btnedit = '<a data-toggle="modal" data-target="#fm_model" href="' . url('admin/Home/createitem/') . $row->id . '" data-title="Edit Item : ' . $row->name . '"  class="btn btn-link pd-10"><i class="far fa-edit"></i></a> ';

            $btndelete = '<a data-toggle="modal" target="_blank"   title="Item name: ' . $row->name . '"  onclick="editable_remove(this)"  data-val="' . $row->id . '"  data-pk="' . $row->id . '" tabindex="-1" class="btn btn-link"><i class="far fa-trash-alt"></i></a> ';
            return $btnedit . $btndelete;
        }, 'last');

        return $data_table->toJSON();
    }

    public function getbrand($post)
    {

        $db = $this->db;
        $builder = $db->table('brand');
        $builder->select('id,brand');
        $builder->like('brand', (@$post['searchTerm']) ? @$post['searchTerm'] : '');
        $builder->where('is_delete', 0);
        // $builder->where('pcategory', 0);
        $builder->limit(10);
        $query = $builder->get();
        $getdata = $query->getResultArray();

        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['brand'],
                "id" => $row['id'],
            );
        }
        return $result;
    }
    public function getCategory($post)
    {

        $db = $this->db;
        $builder = $db->table('category');
        $builder->select('id,category');
        $builder->like('category', (@$post['searchTerm']) ? @$post['searchTerm'] : '');
        $builder->where('is_delete', 0);
        // $builder->where('pcategory', 0);
        $builder->limit(10);
        $query = $builder->get();
        $getdata = $query->getResultArray();

        $result = array();
        foreach ($getdata as $row) {
            $result[] = array(
                "text" => $row['category'],
                "id" => $row['id'],
            );
        }
        return $result;
    }
    public function get_master_data($method, $id)
    {
        $db = $this->db;
        $result = array();
        if ($method == 'brand') {
            $gmodel = new GeneralModel();
            $result['brand'] = $gmodel->get_data_table('brand', array('id' => $id),'*');
        }

        if ($method == 'category') {
            $gmodel = new GeneralModel();
            $result['category'] = $gmodel->get_data_table('category', array('id' => $id),'*');
        }
        if ($method == 'slider') {
            $gmodel = new GeneralModel();
            $result['slider'] = $gmodel->get_data_table('slider', array('id' => $id),'*');
        }
        if ($method == 'item') {
            $gmodel = new GeneralModel();
            $result['item'] = $gmodel->get_data_table('item', array('id' => $id),'*');
        }

        return $result;
    }
    public function UpdateData($post)
    {
        $result = array();
        $db = $this->db;

        if ($post['type'] == 'Remove') {

            if ($post['method'] == 'brand') {

                $gmodel = new GeneralModel();
                $result = $gmodel->update_data_table('brand', array('id' => $post['pk']), array('is_delete' => '1'));
            }
            if ($post['method'] == 'category') {

                $gmodel = new GeneralModel();
                $result = $gmodel->update_data_table('category', array('id' => $post['pk']), array('is_delete' => '1'));
            }
        }
        return $result;
    }
    public function insert_edit_item($post, $file)
    {
        //   echo "<pre>";  print_r($post);exit;print_r($file);exit;
        $db = $this->db;
        $builder = $db->table('item');
        $builder->select('*');
        $builder->where(array('id' => $post['id']));
        $query = $builder->get();
        $result = $query->getResultArray();
        // echo "<pre>";print_r($result);exit;
        if (!empty($post['p_images'])) {
            // echo '<pre>'; print_r($post['p_images']);exit;
            $builder_img = $db->table('imagebook');
            $builder_img->select('*');
            $builder_img->whereIn('iid', $post['p_images']);
            $builder_img->where(array('isdelete' => '0', 'isunlink' => '0'));
            $img_query = $builder_img->get();
            $img_data = $img_query->getResultArray();
            // echo "<pre>";print_r($img_data);exit;
            $pimages_galary = array();
            $pIid = array();
            if (!empty($img_data)) {
                foreach ($img_data as $images) {

                    if ($images['itype'] == 'G') {
                        $pimages_galary[] = array(
                            'imageid' => $images['id'],
                            'pimageid' => $images['iid'],
                            'iid' => $images['iid'],
                            'file_name' => $images['file_name'],
                            'image_name' => $images['updated_file'],
                            'h_path' => $images['h_path'],
                            't_path' => $images['t_path'],
                            'c_path' => $images['c_path'],
                            'file_size' => $images['file_size'],
                            'file_type' => 'image/' . $images['file_type'],
                            'file_ext' => $images['file_type'],
                        );
                    }

                    $pIid[] = $images['id'];
                    // echo '<pre>'; print_r($pIid);exit;  
                }
            }
        }
        $pdata = array(
            'brand' => @$post['brand'],
            'category' => @$post['category'],
            'name' => $post['item'],
            'gallery' => empty($pimages_galary) ? '' : json_encode($pimages_galary),
            'description' => $post['description'],
            'additional_information' => $post['additional_information'],
            'price' => $post['mrpprice'],
            'listedprice' => $post['price'],
            'discount' => $post['discount'],
            'igst' => $post['igst'],
            'cgst' => $post['cgst'],
            'sgst' => $post['sgst'],
            'stock' => $post['stock']
        );
        if (isset($file)) {
            if ($file->isValid() && !$file->hasMoved()) {
                $originalPath = '/brand/' . date('Ymd') . '/';
                if (!file_exists(getcwd() . $originalPath)) {
                    mkdir(getcwd() . $originalPath, 0777, true);
                }
                $newName = $file->getRandomName();
                $file->move(getcwd() . $originalPath, $newName);
                $pdata['image'] = $originalPath . $newName;
            }
        }
        if (!empty($result)) {
            $msg = array();
            if (!empty($pimages_galary)) {
                $pdata2['update_time'] = date('Y-m-d H:i:s');
                $pdata2['update_by'] = session('id');
                $pdata2['pid'] = $post['id'];
                $builder->where(array("id" => $post['id']));
                // print_r($pdata);exit;
                $result = $builder->Update($pdata);
                $builder1 = $db->table('imagebook');
                $builder1->whereIn("id", $pIid);
                $result1 = $builder1->Update($pdata2);
                if ($result && $result1) {
                    $msg = array('st' => 'success', 'msg' => "Data Updated", 'location' => url('admin/Home/item'));
                } else {
                    $msg = array('st' => 'fail', 'msg' => "Data Updated fail");
                }
            }
        } else {
            $pdata['created_at'] = date('Y-m-d H:i:s');
            $pdata['created_by'] = session('id');
            $res = $builder->insert($pdata);
            $id = $db->insertID();
            $pdata2['pid'] = $id;
            $builder1 = $db->table('imagebook');
            $builder1->where(array("pid" => 0));
            $result1 = $builder1->Update($pdata2);
            if ($res && $result1) {
                $msg = array('st' => 'success', 'msg' => "Data Inserted");
            } else {
                $msg = array('st' => 'fail', 'msg' => "Data Inserted fail");
            }
        }
        return $msg;
    }
    public function multipleupload($data)
    {
        // echo "<pre>"; print_r($data);exit;
        $db = $this->db;
        if (true) {
            helper('base');
            ini_set('memory_limit', '-1');

            $last_array = isset($data['last_array']) ? trim($data['last_array']) : 0;

            $original_path = '/imgbook/o/' . date('Ymd') . '/';

            $host_path = base_url();

            if (!file_exists(getcwd() . $original_path)) {
                mkdir(getcwd() . $original_path, 0777, true);
            }

            $tempFile = $_FILES['file']['tmp_name'];
            $file = $_FILES['file']['name'];
            $filesize = $_FILES['file']['size'];


            $i = $last_array;
            $temp = array();
            $dataArray = array();
            $output = array();
            $builder = $db->table('imagebook');
            $image_book_insert = array();
            foreach ($file as $key => $file_val) {
                $ext = pathinfo($file_val, PATHINFO_EXTENSION);
                $time = time();
                $rand = rand();
                $fn = $time . $rand . '.' . $ext;
                array_push($temp, $fn);
                $targetFile = getcwd() . $original_path . $fn;
                // print_r($targetFile);
                // exit;
                move_uploaded_file($tempFile[$key], $targetFile);

                $output['name'][$i] = $file_val;
                $output['ext'][$i] = $ext;
                $output['iid'][$i] = $time . $rand;
                $itype = 'G';

                $output['input'][$i] = '<input type="hidden" class="p_images" data-val="' . $time . $rand . '"  name="p_images[' . $i . ']" value="' . $time . $rand . '">';

                $i++;
                $image_book_insert[] = array(
                    'file_name' => $file_val,
                    'file_size' => $filesize[$key],
                    'file_type' => $ext,
                    'itype' => $itype,
                    'iid' => $time . $rand,
                    'updated_file' => $fn,
                    'h_path' => $host_path,
                    'o_path' => $original_path,
                    't_path' => $original_path,
                    'c_path' => $original_path,
                    'create_time' => date('Y-m-d H:i:s'),
                    'create_by' => session('id'),
                    'isactive' => 0,
                    'isdelete' => 0,
                    'isunlink' => 0,
                );
            }
            $insert_id = array();
            if (!empty($image_book_insert)) {
                $builder->insertBatch($image_book_insert);
                $insert_id = $db->insertID();
                //    print_r($insert_id);exit;
            }


            $array['name'] = $output['name'];
            $array['input'] = $output['input'];

            $array['ext'] = $output['ext'];
            $array['iid'] = $output['iid'];
            $array['t_path'] = $original_path;

            $array['status'] = 1;
            $array['st'] = 'success';
            $result = $array;
        } else {
            $result = array('st' => 'fail', 'msg' => 'Access Verify Failed!! ReLogin Again', 'mmsg' => 'request_create_fail');
        }

        return $result;
    }
    
}
