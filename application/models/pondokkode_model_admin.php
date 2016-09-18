<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class pondokkode_model_admin extends CI_Model {

    public function generate_berita($limit,$offset,$filter=array())
    {
    $hasil="";
    $data_berita = $filter['data_berita'];
    $query_add = " WHERE a.judul_berita like '%".$data_berita."%' OR a.isi_berita like '%".$data_berita."%'";

    $tot_hal = $this->db->query("SELECT * FROM tbl_berita as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add."");

    $config['base_url'] = base_url() . 'admin/posting/berita/index/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 5;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT * FROM tbl_berita as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add." ORDER BY a.id_berita DESC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                  $hasil .= '<div class="alert alert-danger text-center">
                             <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                             </div>';
              }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                          <thead class="flip-content">
                          <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Judul</th>
                          <th class="text-center">Author</th>
                          <th class="text-center">Status ?</th>
                          <th class="text-center">Aksi</th>
                          </tr>
                          </thead><tbody>';
              $no = $offset+1;
    foreach($w->result() as $h)
    {
      if ($h->aktif==1){
      $btnaktif = "<a href='#' class='btn btn-xs blue tooltips modal-aktivasi-berita' data-toggle='modal' data-id='".$this->encryption->encode($h->id_berita)."' data-nama='".$h->judul_berita."' data-status='0' title='Not Activated'><i class='fa fa fa-ban'></i></a>";
      $aktif_or_no = '<span class="label label-success label-mini">Publish</span>';
      }else{
      $btnaktif = "<a href='#' class='btn btn-xs blue tooltips modal-aktivasi-berita' data-toggle='modal' data-id='".$this->encryption->encode($h->id_berita)."' data-nama='".$h->judul_berita."' data-status='1' title='Activated'><i class='fa fa-check-circle'></i></a>";
      $aktif_or_no = '<span class="label label-danger label-mini">Draft</span>';
      }
    $hasil .= " <tr>
                                  <td class='text-center'>".$no."</td>
                                  <td>".$h->judul_berita."</td>
                                  <td>".$h->nama_user."</td>
                                  <td class='text-center'>".$aktif_or_no."</td>
                                  <td class='text-center'>
                                  <a class='btn btn-xs blue tooltips' title='Edit' href='".base_url()."admin/posting/berita/edit/".$this->encryption->encode($h->id_berita)."'><i class='fa fa-pencil'></i></a>
                                  $btnaktif
                                  <a class='btn btn-xs blue tooltips modal-delete-berita' title='Hapus' href='#' data-toggle='modal' data-id='".$this->encryption->encode($h->id_berita)."' data-nama='".$h->judul_berita."'><i class='fa fa-trash-o'></i></a>";
                      $hasil .= "</td></tr>";
                      $no++;
    }
    $hasil .= '</tbody></table>';
              }
              return $hasil;
    }

    public function generate_artikel($limit,$offset,$filter=array())
    {
    $hasil="";
    $data_artikel = $filter['data_artikel'];
    $query_add = " WHERE a.judul_artikel like '%".$data_artikel."%' OR a.isi_artikel like '%".$data_artikel."%'";

    $tot_hal = $this->db->query("SELECT a.id_artikel, a.judul_artikel, a.kategori_artikel, a.aktif, a.isi_artikel, b.nama_kategori, c.id_user, c.nama_user FROM tbl_artikel a LEFT JOIN tbl_kategori b ON a.kategori_artikel=b.id_kategori LEFT JOIN tbl_user c ON a.id_user_update=c.id_user ".$query_add."");

    $config['base_url'] = base_url() . 'admin/posting/artikel/index/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 5;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT a.id_artikel, a.judul_artikel, a.kategori_artikel, a.aktif, a.isi_artikel, b.nama_kategori, c.id_user, c.nama_user FROM tbl_artikel a LEFT JOIN tbl_kategori b ON a.kategori_artikel=b.id_kategori LEFT JOIN tbl_user c ON a.id_user_update=c.id_user ".$query_add." ORDER BY a.id_artikel DESC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                  $hasil .= '<div class="alert alert-danger text-center">
                             <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                             </div>';
              }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                          <thead class="flip-content">
                          <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Judul</th>
                          <th class="text-center">Kategori</th>
                          <th class="text-center">Author</th>
                          <th class="text-center">Status ?</th>
                          <th class="text-center">Aksi</th>
                          </tr>
                          </thead><tbody>';
              $no = $offset+1;
    foreach($w->result() as $h)
    {
      if ($h->aktif==1){
      $btnaktif = "<a href='#' class='btn btn-xs blue tooltips modal-aktivasi-artikel' data-toggle='modal' data-id='".$this->encryption->encode($h->id_artikel)."' data-nama='".$h->judul_artikel."' data-status='0' title='Not Activated'><i class='fa fa fa-ban'></i></a>";
      $aktif_or_no = '<span class="label label-success label-mini">Publish</span>';
      }else{
      $btnaktif = "<a href='#' class='btn btn-xs blue tooltips modal-aktivasi-artikel' data-toggle='modal' data-id='".$this->encryption->encode($h->id_artikel)."' data-nama='".$h->judul_artikel."' data-status='1' title='Activated'><i class='fa fa-check-circle'></i></a>";
      $aktif_or_no = '<span class="label label-danger label-mini">Draft</span>';
      }
    $hasil .= " <tr>
                                  <td class='text-center'>".$no."</td>
                                  <td>".$h->judul_artikel."</td>
                                  <td class='text-center'>".$h->nama_kategori."</td>
                                  <td>".$h->nama_user."</td>
                                  <td class='text-center'>".$aktif_or_no."</td>
                                  <td class='text-center'>
                                  <a class='btn btn-xs blue tooltips' title='Edit' href='".base_url()."admin/posting/artikel/edit/".$this->encryption->encode($h->id_artikel)."'><i class='fa fa-pencil'></i></a>
                                  $btnaktif
                                  <a class='btn btn-xs blue tooltips modal-delete-artikel' title='Hapus' href='#' data-toggle='modal' data-id='".$this->encryption->encode($h->id_artikel)."' data-nama='".$h->judul_artikel."'><i class='fa fa-trash-o'></i></a>";
                      $hasil .= "</td></tr>";
                      $no++;
    }
    $hasil .= '</tbody></table>';
              }
              return $hasil;
    }

    public function generate_kategori($limit,$offset,$filter=array())
    {
    $hasil="";
    $data_kategori = $filter['data_kategori'];
    $query_add = " WHERE nama_kategori like '%".$data_kategori."%'";

    $tot_hal = $this->db->query("SELECT * FROM tbl_kategori ".$query_add."");

    $config['base_url'] = base_url() . 'admin/posting/kategori/index/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 5;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT * FROM tbl_kategori ".$query_add." ORDER BY id_kategori DESC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                  $hasil .= '<div class="alert alert-danger text-center">
                             <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                             </div>';
              }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                          <thead class="flip-content">
                          <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Nama Kategori</th>
                          <th class="text-center">Aksi</th>
                          </tr>
                          </thead><tbody>';
              $no = $offset+1;
    foreach($w->result() as $h)
    {
    $hasil .= " <tr>
                                  <td class='text-center'>".$no."</td>
                                  <td>".$h->nama_kategori."</td>
                                  <td class='text-center'>
                                  <a class='btn btn-xs blue tooltips' title='Edit' href='".base_url()."admin/posting/kategori/edit/".$this->encryption->encode($h->id_kategori)."'><i class='fa fa-pencil'></i></a>";
                      $hasil .= "</td></tr>";
                      $no++;
    }
    $hasil .= '</tbody></table>';
              }
              return $hasil;
    }

    public function generate_agenda($limit,$offset,$filter=array())
    {
    $hasil="";
    $data_agenda = $filter['data_agenda'];
    $query_add = " WHERE a.judul_agenda like '%".$data_agenda."%' OR a.isi_agenda like '%".$data_agenda."%'";

    $tot_hal = $this->db->query("SELECT * FROM tbl_agenda as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add."");

    $config['base_url'] = base_url() . 'admin/info/agenda/index/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 5;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT * FROM tbl_agenda as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add." ORDER BY a.id_agenda DESC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                  $hasil .= '<div class="alert alert-danger text-center">
                             <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                             </div>';
              }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                          <thead class="flip-content">
                          <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Judul</th>
                          <th class="text-center">Author</th>
                          <th class="text-center">Status ?</th>
                          <th class="text-center">Aksi</th>
                          </tr>
                          </thead><tbody>';
              $no = $offset+1;
    foreach($w->result() as $h)
    {
      if ($h->aktif==1){
      $btnaktif = "<a href='#' class='btn btn-xs blue tooltips modal-aktivasi-agenda' data-toggle='modal' data-id='".$this->encryption->encode($h->id_agenda)."' data-nama='".$h->judul_agenda."' data-status='0' title='Not Activated'><i class='fa fa fa-ban'></i></a>";
      $aktif_or_no = '<span class="label label-success label-mini">Publish</span>';
      }else{
      $btnaktif = "<a href='#' class='btn btn-xs blue tooltips modal-aktivasi-agenda' data-toggle='modal' data-id='".$this->encryption->encode($h->id_agenda)."' data-nama='".$h->judul_agenda."' data-status='1' title='Activated'><i class='fa fa-check-circle'></i></a>";
      $aktif_or_no = '<span class="label label-danger label-mini">Draft</span>';
      }
    $hasil .= " <tr>
                                  <td class='text-center'>".$no."</td>
                                  <td>".$h->judul_agenda."</td>
                                  <td>".$h->nama_user."</td>
                                  <td class='text-center'>".$aktif_or_no."</td>
                                  <td class='text-center'>
                                  <a class='btn btn-xs blue tooltips' title='Edit' href='".base_url()."admin/info/agenda/edit/".$this->encryption->encode($h->id_agenda)."'><i class='fa fa-pencil'></i></a>
                                  $btnaktif
                                  <a class='btn btn-xs blue tooltips modal-delete-agenda' title='Hapus' href='#' data-toggle='modal' data-id='".$this->encryption->encode($h->id_agenda)."' data-nama='".$h->judul_agenda."'><i class='fa fa-trash-o'></i></a>";
                      $hasil .= "</td></tr>";
                      $no++;
    }
    $hasil .= '</tbody></table>';
              }
              return $hasil;
    }

    public function generate_pengumuman($limit,$offset,$filter=array())
    {
    $hasil="";
    $data_pengumuman = $filter['data_pengumuman'];
    $query_add = " WHERE a.judul_pengumuman like '%".$data_pengumuman."%' OR a.isi_pengumuman like '%".$data_pengumuman."%'";

    $tot_hal = $this->db->query("SELECT * FROM tbl_pengumuman as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add."");

    $config['base_url'] = base_url() . 'admin/info/pengumuman/index/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 5;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT * FROM tbl_pengumuman as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add." ORDER BY a.id_pengumuman DESC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                  $hasil .= '<div class="alert alert-danger text-center">
                             <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                             </div>';
              }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                          <thead class="flip-content">
                          <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Judul</th>
                          <th class="text-center">Author</th>
                          <th class="text-center">Status ?</th>
                          <th class="text-center">Aksi</th>
                          </tr>
                          </thead><tbody>';
              $no = $offset+1;
    foreach($w->result() as $h)
    {
      if ($h->aktif==1){
      $btnaktif = "<a href='#' class='btn btn-xs blue tooltips modal-aktivasi-pengumuman' data-toggle='modal' data-id='".$this->encryption->encode($h->id_pengumuman)."' data-nama='".$h->judul_pengumuman."' data-status='0' title='Not Activated'><i class='fa fa fa-ban'></i></a>";
      $aktif_or_no = '<span class="label label-success label-mini">Publish</span>';
      }else{
      $btnaktif = "<a href='#' class='btn btn-xs blue tooltips modal-aktivasi-pengumuman' data-toggle='modal' data-id='".$this->encryption->encode($h->id_pengumuman)."' data-nama='".$h->judul_pengumuman."' data-status='1' title='Activated'><i class='fa fa-check-circle'></i></a>";
      $aktif_or_no = '<span class="label label-danger label-mini">Draft</span>';
      }
    $hasil .= " <tr>
                                  <td class='text-center'>".$no."</td>
                                  <td>".$h->judul_pengumuman."</td>
                                  <td>".$h->nama_user."</td>
                                  <td class='text-center'>".$aktif_or_no."</td>
                                  <td class='text-center'>
                                  <a class='btn btn-xs blue tooltips' title='Edit' href='".base_url()."admin/info/pengumuman/edit/".$this->encryption->encode($h->id_pengumuman)."'><i class='fa fa-pencil'></i></a>
                                  $btnaktif
                                  <a class='btn btn-xs blue tooltips modal-delete-pengumuman' title='Hapus' href='#' data-toggle='modal' data-id='".$this->encryption->encode($h->id_pengumuman)."' data-nama='".$h->judul_pengumuman."'><i class='fa fa-trash-o'></i></a>";
                      $hasil .= "</td></tr>";
                      $no++;
    }
    $hasil .= '</tbody></table>';
              }
              return $hasil;
    }

    public function generate_user($limit,$offset,$filter=array(),$id_user)
    {
    $hasil="";
    $data_user = $filter['data_user'];
    if ($id_user == 1){
      $query_add = "WHERE a.id_user like '%".$data_user."%' OR a.user_name like '%".$data_user."%' OR a.nama_user like '%".$data_user."%'";
      }else{
      $query_add = "WHERE a.id_user != 1 AND (a.id_user like '%".$data_user."%' OR a.user_name like '%".$data_user."%' OR a.nama_user like '%".$data_user."%')";
    }

    $query_add = "WHERE nama_user like '%".$data_user."%' AND user_name like '%".$data_user."%'";
    $tot_hal = $this->db->query("SELECT * FROM tbl_user ".$query_add."");
    $config['base_url'] = base_url() . 'admin/master/user/index/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 5;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT * FROM tbl_user ".$query_add." ORDER BY id_user ASC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                  $hasil .= '<div class="alert alert-danger text-center">
                             <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                             </div>';
              }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                          <thead class="flip-content">
                          <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Nama</th>
                          <th class="text-center">Username</th>
                          <th class="text-center">Aktif ?</th>
                          <th class="text-center">Aksi</th>
                          </tr>
                          </thead><tbody>';
              $no = $offset+1;
    foreach($w->result() as $h)
    {
                      if ($h->aktif_user==1){
                      $btnaktif = "<a href='#' class='btn btn-xs blue tooltips modal-aktivasi-user' data-toggle='modal' data-id='".$this->encryption->encode($h->id_user)."' data-nama='".$h->nama_user."' data-status='0' title='Not Activated'><i class='fa fa fa-ban'></i></a>";
                      $aktif_or_no = '<span class="label label-success label-mini">Ya</span>';
                      }else{
                      $btnaktif = "<a href='#' class='btn btn-xs blue tooltips modal-aktivasi-user' data-toggle='modal' data-id='".$this->encryption->encode($h->id_user)."' data-nama='".$h->nama_user."' data-status='1' title='Activated'><i class='fa fa-check-circle'></i></a>";
                      $aktif_or_no = '<span class="label label-danger label-mini">Tidak</span>';
                      }

    $hasil .= " <tr>
                                  <td class='text-center'>".$no."</td>
                                  <td>".$h->nama_user."</td>
                                  <td>".$h->user_name."</td>
                                  <td class='text-center'>".$aktif_or_no."</td>
                                  <td class='text-center'>
                                  <a class='btn btn-xs blue tooltips' title='Edit' href='".base_url()."admin/master/user/edit/".$this->encryption->encode($h->id_user)."'><i class='fa fa-pencil'></i></a>
                                  $btnaktif
                                  <a class='btn btn-xs blue tooltips modal-delete-user' title='Hapus' href='#' data-toggle='modal' data-id='".$this->encryption->encode($h->id_user)."' data-nama='".$h->nama_user."'><i class='fa fa-trash-o'></i></a>";
                      $hasil .= "</td></tr>";
                      $no++;
    }
    $hasil .= '</table>';
              }
              return $hasil;
    }

    public function generate_session()
    {
    $hasil="";
    $w = $this->db->query("SELECT * FROM tbl_session");
    if(($w->num_rows())<=0)
    {
                    $hasil .= '<div class="alert alert-danger text-center">
                               <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                               </div></div>';
                }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                            <thead class="flip-content">
                            <tr>
                            <th class="text-center">Session Id</th>
                            <th class="text-center">User Agent</th>
                            <th class="text-center">IP Address</th>
                            </tr>
                            </thead><tbody>';
    foreach($w->result() as $h)
    {
      $hasil .= " <tr>
                                    <td>".$h->session_id."</td>
                                    <td>".$h->user_agent."</td>
                                    <td class='text-center'>".$h->ip_address."</td>";
                        $hasil .= "</td></tr>";
    }
    $hasil .= '</tbody></table>';
                }
                return $hasil;
    }

    public function generate_pages($limit,$offset,$filter=array())
    {
    $hasil="";
    $data_pages = $filter['data_pages'];
    $query_add = " WHERE a.judul_pages like '%".$data_pages."%' OR a.isi_pages like '%".$data_pages."%'";

    $tot_hal = $this->db->query("SELECT * FROM tbl_pages as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add." ORDER BY a.judul_pages ASC");

    $config['base_url'] = base_url() . 'admin/konten/pages/index/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 5;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT * FROM tbl_pages as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add." ORDER BY a.judul_pages ASC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                  $hasil .= '<div class="alert alert-danger text-center">
                             <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                             </div>';
              }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                          <thead class="flip-content">
                          <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Judul</th>
                          <th class="text-center">Author</th>
                          <th class="text-center">Data Update</th>
                          <th class="text-center">Aksi</th>
                          </tr>
                          </thead><tbody>';
              $no = $offset+1;
    foreach($w->result() as $h)
    {
    $hasil .= " <tr>
                                  <td class='text-center'>".$no."</td>
                                  <td>".$h->judul_pages."</td>
                                  <td>".$h->nama_user."</td>
                                  <td class='text-center'>".$this->tgl_time_indo($h->last_data_update)."</td>
                                  <td class='text-center'>
                                  <a class='btn btn-xs blue tooltips' title='Edit' href='".base_url()."admin/konten/pages/edit/".$this->encryption->encode($h->id_pages)."'><i class='fa fa-pencil'></i></a>";
                      $hasil .= "</td></tr>";
                      $no++;
    }
    $hasil .= '</tbody></table>';
              }
              return $hasil;
    }

    public function generate_menu($limit,$offset,$filter=array())
    {
    $hasil="";
    $data_menu = $filter['data_menu'];
    $query_add = " WHERE a.judul_menu like '%".$data_menu."%' OR a.isi_menu like '%".$data_menu."%'";

    $tot_hal = $this->db->query("SELECT * FROM tbl_menu as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add." ORDER BY a.id_menu ASC");

    $config['base_url'] = base_url() . 'admin/konten/menu/index/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 5;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT * FROM tbl_menu as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add." ORDER BY a.id_menu ASC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                  $hasil .= '<div class="alert alert-danger text-center">
                             <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                             </div>';
              }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                          <thead class="flip-content">
                          <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Judul</th>
                          <th class="text-center">Author</th>
                          <th class="text-center">Data Update</th>
                          <th class="text-center">Aksi</th>
                          </tr>
                          </thead><tbody>';
              $no = $offset+1;
    foreach($w->result() as $h)
    {
    $hasil .= " <tr>
                                  <td class='text-center'>".$no."</td>
                                  <td>".$h->judul_menu."</td>
                                  <td>".$h->nama_user."</td>
                                  <td class='text-center'>".$this->tgl_time_indo($h->last_data_update)."</td>
                                  <td class='text-center'>
                                  <a class='btn btn-xs blue tooltips' title='Edit' href='".base_url()."admin/konten/menu/edit/".$this->encryption->encode($h->id_menu)."'><i class='fa fa-pencil'></i></a>";
                      $hasil .= "</td></tr>";
                      $no++;
    }
    $hasil .= '</tbody></table>';
              }
              return $hasil;
    }

    public function generate_file($limit,$offset,$filter=array())
    {
    $hasil="";
    $data_file = $filter['data_file'];
    $query_add = " WHERE a.judul_file like '%".$data_file."%'";

    $tot_hal = $this->db->query("SELECT * FROM tbl_file as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add."");

    $config['base_url'] = base_url() . 'admin/file/index/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 4;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT * FROM tbl_file as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add." ORDER BY a.id_file DESC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                  $hasil .= '<div class="alert alert-danger text-center">
                             <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                             </div>';
              }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                          <thead class="flip-content">
                          <tr>
                          <th class="text-center">No.</th>
                          <th class="text-center">Judul</th>
                          <th class="text-center">File</th>
                          <th class="text-center">Publish</th>
                          <th class="text-center">Aksi</th>
                          </tr>
                          </thead><tbody>';
              $no = $offset+1;
    foreach($w->result() as $h)
    {
    $hasil .= " <tr>
                                  <td class='text-center'>".$no."</td>
                                  <td>".$h->judul_file."</td>
                                  <td class='text-center' style='vertical-align: middle;'><a href='".base_url()."assets/file_download/".$h->nama_file."' title='".$h->judul_file."'>$h->nama_file</a></td>
                                  <td class='text-center'>".$this->tgl_indo($h->tgl_publish)." ".$this->jam_format($h->tgl_publish)."</td>
                                  <td class='text-center'>
                                  <a class='btn btn-xs blue tooltips' title='Edit' href='".base_url()."admin/file/edit/".$this->encryption->encode($h->id_file)."'><i class='fa fa-pencil'></i></a>
                                  <a class='btn btn-xs blue tooltips modal-delete-file' title='Hapus' href='#' data-toggle='modal' data-id='".$this->encryption->encode($h->id_file)."' data-nama='".$h->judul_file."'><i class='fa fa-trash-o'></i></a>";
                      $hasil .= "</td></tr>";
                      $no++;
    }
    $hasil .= '</tbody></table>';
              }
              return $hasil;
    }

    public function generate_album($limit,$offset,$filter=array())
    {
    $hasil="";
    $data_album = $filter['data_album'];

    $query_add = " WHERE nama_album like '%".$data_album."%'";

    $tot_hal = $this->db->query("SELECT id_album, nama_album FROM tbl_album ".$query_add."");

    $config['base_url'] = base_url() . 'admin/galeri/index/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 4;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT id_album, nama_album FROM tbl_album ".$query_add." ORDER BY id_album ASC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                    $hasil .= '<div class="alert alert-danger text-center">
                               <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                               </div>';
                }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                            <thead class="flip-content">
                            <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama Album</th>
                            <th class="text-center">Jumlah Foto</th>
                            <th class="text-center">Aksi</th>
                            </tr>
                            </thead><tbody>';
                $no = $offset+1;
    foreach($w->result() as $h)
    {
                        $jml = $this->db->query("SELECT COUNT(album_id) as jml_gambar FROM tbl_foto_galeri WHERE album_id='$h->id_album'")->row();

      $hasil .= " <tr>
                                    <td class='text-center'>".$no."</td>
                                    <td>".$h->nama_album."</td>
                                    <td><i class='fa fa-picture-o'></i> ".$jml->jml_gambar." Gambar</td>
                                    <td class='text-center'>
                                    <a class='btn btn-xs blue tooltips' title='Tambah Gambar' href='".base_url()."admin/galeri/add_picture/".$this->encryption->encode($h->id_album)."'><i class='fa fa-picture-o'></i></a>
                                    <a class='btn btn-xs blue tooltips' title='Edit' href='".base_url()."admin/galeri/edit/".$this->encryption->encode($h->id_album)."'><i class='fa fa-pencil'></i></a>
                                    <a class='btn btn-xs blue tooltips modal-delete-album' title='Hapus' href='#' data-toggle='modal' data-id='".$this->encryption->encode($h->id_album)."' data-nama='".$h->nama_album."'><i class='fa fa-trash-o'></i></a>";
                        $hasil .= "</td></tr>";
                        $no++;
    }
    $hasil .= '</tbody></table>';
                }
                return $hasil;
    }

    public function generate_foto_galeri($limit,$offset,$album_id,$id_album)
    {
    $hasil="";
    $query_add = "WHERE a.album_id='$album_id'";

    $tot_hal = $this->db->query("SELECT a.id_foto_galeri, a.caption_foto, a.lokasi_foto, a.foto_galeri, b.id_album, b.nama_album FROM tbl_foto_galeri a LEFT JOIN tbl_album b ON a.album_id=b.id_album ".$query_add."");

    $config['base_url'] = base_url() . 'admin/galeri/add_picture/'.$id_album.'/';
    $config['total_rows'] = $tot_hal->num_rows();
    $config['per_page'] = $limit=10;
    $config['uri_segment'] = 5;
    $config['first_link'] = 'Pertama';
    $config['last_link'] = 'Terakhir';
    $config['next_link'] = '»';
    $config['prev_link'] = '«';
    $this->pagination->initialize($config);

    $w = $this->db->query("SELECT a.id_foto_galeri, a.caption_foto, a.lokasi_foto, a.foto_galeri, b.id_album, b.nama_album FROM tbl_foto_galeri a LEFT JOIN tbl_album b ON a.album_id=b.id_album ".$query_add." ORDER BY a.id_foto_galeri ASC LIMIT ".$offset.",".$limit."");
    if(($w->num_rows())<=0)
    {
                    $hasil .= '<div class="alert alert-danger text-center">
                               <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                               </div>';
                }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                            <thead class="flip-content">
                            <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Caption Foto</th>
                            <th class="text-center">Lokasi Foto</th>
                            <th class="text-center">Aksi</th>
                            </tr>
                            </thead><tbody><div class="row mix-grid">';
                $no = $offset+1;
    foreach($w->result() as $h)
    {
      $hasil .= " <tr>
                                    <td class='text-center'>".$no."</td>
                                    <td style='vertical-align:middle;'><div class='col-sm-4 mix'><div class='mix-inner'>
                                            <img class='img-responsive' width='300' height='50'  src='".base_url()."assets/foto_galeri/".url_title(strtolower($h->nama_album))."/".$h->foto_galeri."' alt=''>
                                            <div class='mix-details'>
                                            <a class='mix-preview fancybox-button' href='".base_url()."assets/foto_galeri/".url_title(strtolower($h->nama_album))."/".$h->foto_galeri."' title='".$h->caption_foto."' data-rel='fancybox-button'><i class='fa fa-search-plus'></i></a>
                                            </div>
                                    </div></div><h6>".$h->foto_galeri."</h6></td>
                                    <td><input type='text' name='caption_foto[]' autocomplete='off' value='$h->caption_foto' class='form-control' placeholder='Caption Gambar'></td>
                                    <td><input type='text' name='lokasi_foto[]' autocomplete='off' value='$h->lokasi_foto' class='form-control' placeholder='Lokasi Gambar'> <input type='hidden' name='id_foto_galeri[]' value='".$h->id_foto_galeri."'/></td>
                                    <td class='text-center'>
                                    <a class='btn btn-xs blue tooltips modal-delete-foto' title='Hapus' href='#' data-toggle='modal' data-id='".$this->encryption->encode($h->id_foto_galeri)."' data-nama='".$h->foto_galeri."'><i class='fa fa-trash-o'></i></a>";
                        $hasil .= "</td></tr>";
                        $no++;
    }
    $hasil .= '</div></tbody></table></div>
                        <div class="form-actions fluid">
                                <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn blue-stripe"><i class="fa fa-save"></i> Update</button>
                                        <button type="button" class="btn blue-stripe" onclick="javascript:goBack()"><i class="fa fa-arrow-left"></i>  Kembali</button>
                                </div>
                        </div>  ';
                }
                return $hasil;
    }

    public function generate_testimoni()
    {
    $hasil="";
    $w = $this->db->query("SELECT * FROM tbl_testimoni ORDER BY id_testimoni DESC");
    if(($w->num_rows())<=0)
    {
                    $hasil .= '<div class="alert alert-danger text-center">
                               <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                               </div></div>';
                }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                            <thead class="flip-content">
                            <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Nama</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">Isi</th>
                            <th class="text-center">Aksi</th>
                            </tr>
                            </thead><tbody>';
                $no = 0+1;
    foreach($w->result() as $h)
    {
      $hasil .= " <tr>
                                    <td class='text-center'>".$no."</td>
                                    <td><a href='mailto:$h->email_testimoni'>".$h->nama_testimoni."</a></td>
                                    <td class='text-center'>".$this->tgl_time_indo($h->date_testimoni)."</td>
                                    <td>".$h->isi_testimoni."</td>
                                    <td class='text-center'>
                                    <a class='btn btn-xs blue tooltips modal-delete-testimoni' title='Hapus' href='#' data-toggle='modal' data-id='".$this->encryption->encode($h->id_testimoni)."' data-nama='".$h->nama_testimoni."'><i class='fa fa-trash-o'></i></a>";
                        $hasil .= "</td></tr>";
                        $no++;
    }
    $hasil .= '</tbody></table>';
                }
                return $hasil;
    }

    public function generate_setting_umum()
    {
    $hasil="";
    $w = $this->db->query("SELECT * FROM tbl_setting ORDER BY id_setting ASC");
    if(($w->num_rows())<=0)
    {
                    $hasil .= '<div class="alert alert-danger text-center">
                               <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                               </div></div>';
                }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                            <thead class="flip-content">
                            <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center col-md-3">Nama Setting</th>
                            <th class="text-center">Nilai Setting</th>
                            </tr>
                            </thead><tbody>';
    $no = 0+1;
    foreach($w->result() as $h)
    {
      //kondisi textarea
      if($h->id_setting==5)
      {
        $input = "<textarea rows='3' type='text' name='nilai_setting[]' autocomplete='off' value='$h->content_setting' class='form-control' placeholder='Nilai Variabel'>$h->content_setting</textarea>";
      }elseif($h->id_setting==6){
        $input = "<textarea rows='3' type='text' name='nilai_setting[]' autocomplete='off' value='$h->content_setting' class='form-control' placeholder='Nilai Variabel'>$h->content_setting</textarea>";
      }elseif($h->id_setting==13){
        $input = "<textarea rows='3' type='text' name='nilai_setting[]' autocomplete='off' value='$h->content_setting' class='form-control' placeholder='Nilai Variabel'>$h->content_setting</textarea>";
      }elseif($h->id_setting==14){
        $input = "<input type='hidden' name='nilai_setting[]' autocomplete='off' value='$h->content_setting' class='form-control' placeholder='Nilai Variabel'>";
      }else{
        $input = "<input type='text' name='nilai_setting[]' autocomplete='off' value='$h->content_setting' class='form-control' placeholder='Nilai Variabel'>";
      }
      //kondisi nomer
      if($no==14){
        $no = "";
      }
      //kondisi title
      if($h->title=="Logo Website"){
         $h->title = "";
      }
      //kondisi td kosongkan, jika title logo web
      if($h->title=="Logo Website"){
        $td = "";
      }else{
        $td = "<td>$h->title</td>";
      }
      $hasil .= " <tr>
                    <td class='text-center'>".$no."</td>
                    $td
                    <td>".$input."<input type='hidden' name='id_setting[]' value='$h->id_setting'></td>
                </tr>";
    $no++;
    }
    $hasil .= '</tbody></table>';
                }
                return $hasil;
    }

    public function generate_logo()
    {
    $hasil="";

    $w = $this->db->query("SELECT * FROM tbl_setting WHERE id_setting='14'");
    if(($w->num_rows())<=0)
    {
                    $hasil .= '<div class="alert alert-danger text-center">
                               <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                               </div></div>';
                }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                            <thead class="flip-content">
                            <tr>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Priview</th>
                            </tr>
                            </thead><tbody><div class="row mix-grid">';
    foreach($w->result() as $h)
    {
      $hasil .= " <tr>
                          <td style='vertical-align:middle;'><div class='col-sm-4 mix'><div class='mix-inner'>
                              <img class='img-responsive' width='300'  src='".base_url()."assets/images/".$h->content_setting."' alt=''>
                          <td class='text-center'><div class='mix-details'>
                              <a class='mix-preview fancybox-button' href='".base_url()."assets/images/".$h->content_setting."' title='".$h->title."' data-rel='fancybox-button'><i class='fa fa-search'></i> Lihat Gambar</a>
                          </div></td>
                          </div></div></td>";
      $hasil .= "</td></tr>";

    }
    $hasil .= '</tbody></table>';
                }
                return $hasil;
    }

    public function generate_setting_email()
    {
    $hasil="";
    $w = $this->db->query("SELECT * FROM tbl_setting_email ORDER BY id_parameter ASC");
    if(($w->num_rows())<=0)
    {
                    $hasil .= '<div class="alert alert-danger text-center">
                               <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                               </div></div>';
                }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                            <thead class="flip-content">
                            <tr>
                            <th class="text-center col-md-1">No.</th>
                            <th class="text-center col-md-2">Parameter</th>
                            <th class="text-center col-md-4">Nilai Parameter</th>
                            </tr>
                            </thead><tbody>';
                $no = 0+1;
    foreach($w->result() as $h)
    {
                        if($h->id_parameter==4)
                        {
                            $input = "<input type='password' name='nilai_parameter[]' autocomplete='off' value='$h->nilai_parameter' class='form-control' placeholder='Nilai Parameter'>";
                        }else{
                            $input = "<input type='text' name='nilai_parameter[]' autocomplete='off' value='$h->nilai_parameter' class='form-control' placeholder='Nilai Parameter'>";
                        }
      $hasil .= " <tr>
                                    <td class='text-center'>".$no."</td>
                                    <td>".$h->nama_parameter."</td>
                                    <td>".$input." <input type='hidden' name='id_parameter[]' value='$h->id_parameter'></td>
                                    </tr>";
                        $no++;
    }
    $hasil .= '</tbody></table>';
                }
                return $hasil;
    }

    public function generate_banner()
    {
    $hasil="";

    $w = $this->db->query("SELECT * FROM tbl_banner ORDER BY id_banner DESC");
    if(($w->num_rows())<=0)
    {
                    $hasil .= '<div class="alert alert-danger text-center">
                               <i class="fa fa-info-circle"></i> Maaf data yang Anda cari tidak ada.
                               </div></div>';
                }else{
    $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                            <thead class="flip-content">
                            <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Gambar</th>
                            <th class="text-center">Aksi</th>
                            </tr>
                            </thead><tbody><div class="row mix-grid">';
                $no = 0+1;
    foreach($w->result() as $h)
    {
      $hasil .= " <tr>
                        <td class='text-center'>".$no."</td>
                        <td style='vertical-align:middle;'><div class='col-sm-4 mix'><div class='mix-inner'>
                            <img class='img-responsive' width='300'  src='".base_url()."assets/foto_banner/".$h->foto_banner."' alt=''>
                            <div class='mix-details'>
                            <a class='mix-preview fancybox-button' href='".base_url()."assets/foto_banner/".$h->foto_banner."' title='".$h->foto_banner."' data-rel='fancybox-button'><i class='fa fa-search'></i></a>
                          </div>
                          </div></div></td>
                          <td class='text-center'>
                          <a class='btn btn-xs blue tooltips modal-delete-banner' title='Hapus' href='#' data-toggle='modal' data-id='".$this->encryption->encode($h->id_banner)."' data-nama='".$h->foto_banner."'><i class='fa fa-trash-o'></i></a>";
      $hasil .= "</td></tr>";
      $no++;
    }
    $hasil .= '</tbody></table>';
                }
                return $hasil;
    }

    function get_chart_data_for_visits(/*$start_date, $end_date*/) {
            $sql = 'SELECT COUNT(id_counter) as total_pengunjung, DATE(date_visit) as tgl_kunjungan FROM tbl_counter
            ORDER BY DATE(date_visit) DESC';
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
            $data = array();
            foreach ($query->result() as $value) {
            //$data[$key]['label'] = $value['tgl_kunjungan'];
            $data['value'] = $value->total_pengunjung;
            $data['tgl'] = $value->tgl_kunjungan;
            }
            return $data;
            }
            return NULL;
    }

    // Fungsi View //

    function count_in_today()
    {
        $q = $this->db->query("SELECT COUNT(id_counter) as count_in_today FROM tbl_counter WHERE DATE(date_visit) = CURDATE()");
        return $q;
    }

    function count_in_week()
    {
        $q = $this->db->query("SELECT COUNT(id_counter) as count_in_week FROM tbl_counter WHERE DATE(date_visit) BETWEEN CURDATE() - INTERVAL 7 DAY AND CURDATE()");
        return $q;
    }

    function count_in_month()
    {
        $q = $this->db->query("SELECT COUNT(id_counter) as count_in_month FROM tbl_counter WHERE DATE(date_visit) BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()");
        return $q;
    }

    function count_in_year()
    {
        $q = $this->db->query("SELECT COUNT(id_counter) as count_in_year FROM tbl_counter WHERE YEAR(date_visit) = YEAR(CURDATE())");
        return $q;
    }

    function get_detail_user($id_user)
    {
      $query = $this->db->query("SELECT * FROM tbl_user WHERE id_user='$id_user'");
      return $query;
    }

    function get_detail_berita($id_berita)
    {
      $query = $this->db->query("SELECT * FROM tbl_berita WHERE id_berita='$id_berita'");
      return $query;
    }

    function get_detail_artikel($id_artikel)
    {
      $query = $this->db->query("SELECT * FROM tbl_artikel WHERE id_artikel='$id_artikel'");
      return $query;
    }

    function get_kategori_artikel()
    {
		$this->db->order_by('nama_kategori ASC');
		return $this->db->get('tbl_kategori');
    }

    function tampil_detail_kategori($id_kategori)
    {
    	$query = $this->db->query("SELECT id_kategori, nama_kategori FROM tbl_kategori WHERE id_kategori='$id_kategori'");
    	return $query;
    }

    function get_detail_agenda($id_agenda)
    {
      $query = $this->db->query("SELECT * FROM tbl_agenda WHERE id_agenda='$id_agenda'");
      return $query;
    }

    function get_detail_pengumuman($id_pengumuman)
    {
      $query = $this->db->query("SELECT * FROM tbl_pengumuman WHERE id_pengumuman='$id_pengumuman'");
      return $query;
    }

    function get_detail_pages($id_pages)
    {
      $query = $this->db->query("SELECT * FROM tbl_pages WHERE id_pages='$id_pages'");
      return $query;
    }

    function get_detail_menu($id_menu)
    {
      $query = $this->db->query("SELECT * FROM tbl_menu WHERE id_menu='$id_menu'");
      return $query;
    }

    function get_detail_file($id_file)
    {
      $query = $this->db->query("SELECT * FROM tbl_file WHERE id_file='$id_file'");
      return $query;
    }

    function get_detail_album($id_album)
    {
      $query = $this->db->query("SELECT id_album, nama_album FROM tbl_album WHERE id_album='$id_album'");
      return $query;
    }

    // Fungsi GLobal //
    function tgl_time_indo($date=null){
    $tglindo = date("d-m-Y H:i:s", strtotime($date));
    $formatTanggal = $tglindo;
    return $formatTanggal;
    }

    function tgl_database($date=null)
    {
        $tgldatabase = date("Y-m-d", strtotime($date));
        $formatTanggal = $tgldatabase;
        return $formatTanggal;
    }

    function tgl_indo($date=null)
    {
        $tglindo = date("d-m-Y", strtotime($date));
        $formatTanggal = $tglindo;
        return $formatTanggal;
    }

    function tgl_tunggal($date=null)
    {
      $tglindo = date("j", strtotime($date));
      $formatTanggal = $tglindo;
      return $formatTanggal;
    }

    function tgl_mont_year($date=null)
    {
      $tglindo = date("n, Y");
      return $tglindo;
    }

    function jam_format($time=null)
    {
        $jamformat = date("H:i", strtotime($time));
        $formatJam = $jamformat;
        return $formatJam;
    }

    function bulan_inggris($date=null){
    //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
    $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
    //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
    $array_bulan = array(1=>'Jan','Feb','Mar', 'Apr', 'May', 'Jun','Jul','Aug',
    'Sep','Oct', 'Nov','Dec');
    if($date == null) {
    //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
    $hari = $array_hari[date('N')];
    $tanggal = date ('j');
    $bulan = $array_bulan[date('n')];
    $tahun = date('Y');
    } else {
    //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
    $date = strtotime($date);
    $hari = $array_hari[date('N',$date)];
    $tanggal = date ('j', $date);
    $bulan = $array_bulan[date('n',$date)];
    $tahun = date('Y',$date);
    }
    $formatTanggal = $tanggal ." ". $bulan ." ". $tahun;
    return $formatTanggal;
    }

    function tgl_indo_no_hari($date=null){
	    //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
	    $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
	    //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
	    $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
	    'September','Oktober', 'November','Desember');
	    if($date == null) {
	    //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
	    $hari = $array_hari[date('N')];
	    $tanggal = date ('j');
	    $bulan = $array_bulan[date('n')];
	    $tahun = date('Y');
	    } else {
	    //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
	    $date = strtotime($date);
	    $hari = $array_hari[date('N',$date)];
	    $tanggal = date ('j', $date);
	    $bulan = $array_bulan[date('n',$date)];
	    $tahun = date('Y',$date);
	    }
	    $formatTanggal = $tanggal ." ". $bulan ." ". $tahun;
	    return $formatTanggal;
    }

    function tgl_indo_lengkap($date=null){
	    //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
	    $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
	    //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
	    $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
	    'September','Oktober', 'November','Desember');
	    if($date == null) {
	    //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
	    $hari = $array_hari[date('N')];
	    $tanggal = date ('d');
	    $bulan = $array_bulan[date('n')];
	    $tahun = date('Y');
	    $jam = date('H:i:s');
	    } else {
	    //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
	    $date = strtotime($date);
	    $hari = $array_hari[date('N',$date)];
	    $tanggal = date ('d', $date);
	    $bulan = $array_bulan[date('n',$date)];
	    $tahun = date('Y',$date);
	    $jam = date('H:i:s',$date);
	    }
	    $formatTanggal = $hari . ", " . $tanggal ." ". $bulan ." ". $tahun ." Jam ". $jam;
	    return $formatTanggal;
    }

    function tgl_jam_indo_no_hari($date=null){
	    //buat array nama hari dalam bahasa Indonesia dengan urutan 1-7
	    $array_hari = array(1=>'Senin','Selasa','Rabu','Kamis','Jumat', 'Sabtu','Minggu');
	    //buat array nama bulan dalam bahasa Indonesia dengan urutan 1-12
	    $array_bulan = array(1=>'Januari','Februari','Maret', 'April', 'Mei', 'Juni','Juli','Agustus',
	    'September','Oktober', 'November','Desember');
	    if($date == null) {
	    //jika $date kosong, makan tanggal yang diformat adalah tanggal hari ini
	    $hari = $array_hari[date('N')];
	    $tanggal = date ('d');
	    $bulan = $array_bulan[date('n')];
	    $tahun = date('Y');
	    $jam = date('H:i:s');
	    } else {
	    //jika $date diisi, makan tanggal yang diformat adalah tanggal tersebut
	    $date = strtotime($date);
	    $hari = $array_hari[date('N',$date)];
	    $tanggal = date ('d', $date);
	    $bulan = $array_bulan[date('n',$date)];
	    $tahun = date('Y',$date);
	    $jam = date('H:i:s',$date);
	    }
	    $formatTanggal = $tanggal ." ". $bulan ." ". $tahun ." Jam ". $jam;
	    return $formatTanggal;
	    }

	    function rupiah($angka) {
	      $rupiah = number_format($angka ,0, '' , '.' );
	      return $rupiah;
   }

   function fstrip_html_tags( $text ) //Fungsi Untuk  mengatasi teks berformat
   {
		$search = array ("'<script[^>]*?>.*?</script>'si",
		                 "'<[/!]*?[^<>]*?>'si",
		                 "'&(quot|#34);'i",
		                 "'&(amp|#38);'i",
		                 "'&(lt|#60);'i",
		                 "'&(gt|#62);'i",
		                 "'&(nbsp|#160);'i",
		                 "'&(iexcl|#161);'i",
		                 "'&(cent|#162);'i",
		                 "'&(pound|#163);'i",
		                 "'&(copy|#169);'i",
		                 "'&#(d+);'e");

		$replace = array ("",
		                 "",
		                 "\"",
		                 "&",
		                 "<",
		                 ">",
		                 " ",
		                 chr(161),
		                 chr(162),
		                 chr(163),
		                 chr(169),
		                 "chr(\1)");

		$text = str_replace($search, $replace, $text);

		    return ($text);
    }

    function fpotongteks( $text, $limit ) //Fungsi Untuk Memotong Panjang
    {

		$text = $this->fstrip_html_tags($text);
		if( strlen($text)>$limit )
		  {
		    $text = substr( $text,0,$limit );
		    $text = substr( $text,0,-(strlen(strrchr($text,' '))) ); $text="$text";
		  }

		return $text;
    }
  }
