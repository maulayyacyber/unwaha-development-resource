<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* @package      Website MA-IHSANNIAT
* @version      0.1.2
* @author       Fika Ridaul Maulayya
* @copyright    Copyright © 2015 Pondok Kode - Web Project Development.
* @link         http://pondokkode.com
*/
class pondokkode_model_web extends CI_Model {

    public function get_banner()
    {
        $hasil ="";
        $w = $this->db->query("SELECT foto_banner FROM tbl_banner ORDER BY id_banner DESC");

        $hasil .= '<div class="master-slider ms-skin-black-2 round-skin" id="masterslider">';

        foreach ($w->result() as $h)
        {
            $hasil .= '<div class="ms-slide" style="z-index: 10">
                                <img src="'.base_url().'assets/foto_banner/'.$h->foto_banner.'" data-src="'.base_url().'assets/foto_banner/'.$h->foto_banner.'" alt="">
                       </div>';
        }
        $hasil .= '</div>';
        return $hasil;
    }

    public function get_berita_index($limit,$offset,$filter=array())
      {
          $hasil = "";
          $data_berita = $filter['cari_berita'];
          $tot_hal = $this->db->query("SELECT * FROM tbl_berita a LEFT JOIN  tbl_user b ON a.id_user_update=b.id_user WHERE a.aktif='1' AND a.judul_berita LIKE '%".$data_berita."%' ORDER BY a.id_berita DESC");
          $config['base_url'] = base_url() . 'berita/page/';
          $config['total_rows'] = $tot_hal->num_rows();
          $config['per_page'] = $limit=3;
          $config['uri_segment'] = 3;
          $config['first_link'] = 'Pertama';
          $config['last_link'] = 'Terakhir';
          $config['next_link'] = '<i class="icon-control-forward"></i>';
          $config['prev_link'] = '<i class="icon-control-rewind"></i>';
          $this->pagination->initialize($config);
          $w = $this->db->query("SELECT * FROM tbl_berita a LEFT JOIN  tbl_user b ON a.id_user_update=b.id_user WHERE a.aktif='1' AND a.judul_berita LIKE '%".$data_berita."%' ORDER BY a.id_berita DESC LIMIT ".$offset.",".$limit."");
          if(($w->num_rows())<=0)
          {
              $hasil .='<div class="alert alert-block alert-danger fade in">
                          <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                        </div>';
          }else{
          	foreach ($w->result() as $h) {
          		$hasil .= '<div class="blog margin-bottom-20">
                            <h2><a href="'.base_url().'berita/'.$h->url.'/">'.$h->judul_berita.'</a></h2>
                            <div class="headline-post headline-md"></div>
                            <div class="blog-post-tags">
                                <ul class="list-unstyled list-inline blog-info">
                                <li><i class="fa fa-calendar tooltips" title="Tanggal"></i> '.$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish).'</li>
                                <li><i class="fa fa-clock-o tooltips" title="Pukul"></i> '.$this->pondokkode_model_admin->jam_format($h->tgl_publish).'</li>
                                <li><i class="fa fa-user tooltips" title="Penulis"></i> '.$h->nama_user.'</li>
                                <li><i class="fa fa-eye tooltips" title="Dilihat"></i> Dilihat '.$h->dilihat.' Kali</li>
                                </ul>
                            </div>
                            <div class="headline-post headline-md"></div>
                            <p>'.strip_tags(substr($h->isi_berita,0,800)).'...</p>
                            <p><a class="btn-u btn-u-small" href="'.base_url().'berita/'.$h->url.'/"> Baca Selengkapnya <i class="icon-arrow-right"></i></a></p>
                            <br>
                            <div class="headline-post headline-md"></div>

                        </div>';
          	}
          }
          return $hasil;
      }


      public function get_artikel_index($limit,$offset,$filter=array())
      {
            $hasil = "";
            $data_artikel = $filter['cari_artikel'];
            $tot_hal = $this->db->query("SELECT * FROM tbl_artikel as a JOIN tbl_kategori as b ON a.kategori_artikel=b.id_kategori JOIN tbl_user as c ON a.id_user_update=c.id_user WHERE a.aktif='1' AND a.judul_artikel LIKE '%".$data_artikel."%' ORDER BY a.id_artikel DESC");
            $config['base_url'] = base_url() . 'artikel/page/';
            $config['total_rows'] = $tot_hal->num_rows();
            $config['per_page'] = $limit=3;
            $config['uri_segment'] = 3;
            $config['first_link'] = 'Pertama';
            $config['last_link'] = 'Terakhir';
            $config['next_link'] = '<i class="icon-control-forward"></i>';
            $config['prev_link'] = '<i class="icon-control-rewind"></i>';
            $this->pagination->initialize($config);
            $w = $this->db->query("SELECT * FROM tbl_artikel as a JOIN tbl_kategori as b ON a.kategori_artikel=b.id_kategori JOIN tbl_user as c ON a.id_user_update=c.id_user WHERE a.aktif='1' AND a.judul_artikel LIKE '%".$data_artikel."%' ORDER BY a.id_artikel DESC LIMIT ".$offset.",".$limit."");
            if(($w->num_rows())<=0)
            {
                $hasil .='<div class="alert alert-block alert-danger fade in">
                            <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                          </div>';
            }else{
            	foreach ($w->result() as $h) {
            		$hasil .= '<div class="blog margin-bottom-20">
                              <h2><a href="'.base_url().'artikel/'.$h->url.'/">'.$h->judul_artikel.'</a></h2>
                              <div class="headline-post headline-md"></div>
                              <div class="blog-post-tags">
                                  <ul class="list-unstyled list-inline blog-info">
                                  <li><i class="fa fa-calendar tooltips" title="Tanggal"></i> '.$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish).'</li>
                                  <li><i class="fa fa-clock-o tooltips" title="Pukul"></i> '.$this->pondokkode_model_admin->jam_format($h->tgl_publish).'</li>
                                  <li><i class="fa fa-user tooltips" title="Penulis"></i> '.$h->nama_user.'</li>
                                  <li><i class="fa fa-folder-open tooltips" title="Kategori"></i> '.$h->nama_kategori.'</li>
                                  <li><i class="fa fa-eye tooltips" title="Dilihat"></i> Dilihat '.$h->dilihat.' Kali</li>
                                  </ul>
                              </div>
                              <div class="headline-post headline-md"></div>
                              <p>'.strip_tags(substr($h->isi_artikel,0,800)).'...</p>
                              <p><a class="btn-u btn-u-small" href="'.base_url().'artikel/'.$h->url.'/"> Baca Selengkapnya <i class="icon-arrow-right"></i></a></p>
                              <br>
                              <div class="headline-post headline-md"></div>

                          </div>';
            	}
            }
            return $hasil;
        }

        public function get_agenda_index($limit,$offset,$filter=array())
        {
              $hasil = "";
              $data_agenda = $filter['cari_agenda'];
              $tot_hal = $this->db->query("SELECT * FROM tbl_agenda as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.aktif='1' AND a.judul_agenda LIKE '%".$data_agenda."%' ORDER BY a.id_agenda DESC");
              $config['base_url'] = base_url() . 'agenda/page/';
              $config['total_rows'] = $tot_hal->num_rows();
              $config['per_page'] = $limit=3;
              $config['uri_segment'] = 3;
              $config['first_link'] = 'Pertama';
              $config['last_link'] = 'Terakhir';
              $config['next_link'] = '<i class="icon-control-forward"></i>';
              $config['prev_link'] = '<i class="icon-control-rewind"></i>';
              $this->pagination->initialize($config);
              $w = $this->db->query("SELECT * FROM tbl_agenda as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.aktif='1' AND a.judul_agenda LIKE '%".$data_agenda."%' ORDER BY a.id_agenda DESC LIMIT ".$offset.",".$limit."");
              if(($w->num_rows())<=0)
              {
                  $hasil .='<div class="alert alert-block alert-danger fade in">
                              <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                            </div>';
              }else{
              	foreach ($w->result() as $h) {
              		$hasil .= '<div class="blog margin-bottom-20">
                                <h2><a href="'.base_url().'agenda/'.$h->url.'/">'.$h->judul_agenda.'</a></h2>
                                <div class="headline-post headline-md"></div>
                                <div class="blog-post-tags">
                                    <ul class="list-unstyled list-inline blog-info">
                                    <li><i class="fa fa-calendar tooltips" title="Tanggal"></i> '.$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish).'</li>
                                    <li><i class="fa fa-clock-o tooltips" title="Pukul"></i> '.$this->pondokkode_model_admin->jam_format($h->tgl_publish).'</li>
                                    <li><i class="fa fa-user tooltips" title="Penulis"></i> '.$h->nama_user.'</li>
                                    <li><i class="fa fa-eye tooltips" title="Dilihat"></i> Dilihat '.$h->dilihat.' Kali</li>
                                    </ul>
                                </div>
                                <div class="headline-post headline-md"></div>
                                <p>'.strip_tags(substr($h->isi_agenda,0,800)).'...</p>
                                <p><a class="btn-u btn-u-small" href="'.base_url().'agenda/'.$h->url.'/"> Baca Selengkapnya <i class="icon-arrow-right"></i></a></p>
                                <br>
                                <div class="headline-post headline-md"></div>

                            </div>';
              	}
              }
              return $hasil;
          }

          public function get_pengumuman_index($limit,$offset,$filter=array())
          {
                $hasil = "";
                $data_pengumuman = $filter['cari_pengumuman'];
                $tot_hal = $this->db->query("SELECT * FROM tbl_pengumuman as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.aktif='1' AND a.judul_pengumuman LIKE '%".$data_pengumuman."%' ORDER BY a.id_pengumuman DESC");
                $config['base_url'] = base_url() . 'pengumuman/page/';
                $config['total_rows'] = $tot_hal->num_rows();
                $config['per_page'] = $limit=3;
                $config['uri_segment'] = 3;
                $config['first_link'] = 'Pertama';
                $config['last_link'] = 'Terakhir';
                $config['next_link'] = '<i class="icon-control-forward"></i>';
                $config['prev_link'] = '<i class="icon-control-rewind"></i>';
                $this->pagination->initialize($config);
                $w = $this->db->query("SELECT * FROM tbl_pengumuman as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.aktif='1' AND a.judul_pengumuman LIKE '%".$data_pengumuman."%' ORDER BY a.id_pengumuman DESC LIMIT ".$offset.",".$limit."");
                if(($w->num_rows())<=0)
                {
                    $hasil .='<div class="alert alert-block alert-danger fade in">
                                <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                              </div>';
                }else{
                	foreach ($w->result() as $h) {
                		$hasil .= '<div class="blog margin-bottom-20">
                                  <h2><a href="'.base_url().'pengumuman/'.$h->url.'/">'.$h->judul_pengumuman.'</a></h2>
                                  <div class="headline-post headline-md"></div>
                                  <div class="blog-post-tags">
                                      <ul class="list-unstyled list-inline blog-info">
                                      <li><i class="fa fa-calendar tooltips" title="Tanggal"></i> '.$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish).'</li>
                                      <li><i class="fa fa-clock-o tooltips" title="Pukul"></i> '.$this->pondokkode_model_admin->jam_format($h->tgl_publish).'</li>
                                      <li><i class="fa fa-user tooltips" title="Penulis"></i> '.$h->nama_user.'</li>
                                      <li><i class="fa fa-eye tooltips" title="Dilihat"></i> Dilihat '.$h->dilihat.' Kali</li>
                                      </ul>
                                  </div>
                                  <div class="headline-post headline-md"></div>
                                  <p>'.strip_tags(substr($h->isi_pengumuman,0,800)).'...</p>
                                  <p><a class="btn-u btn-u-small" href="'.base_url().'pengumuman/'.$h->url.'/"> Baca Selengkapnya <i class="icon-arrow-right"></i></a></p>
                                  <br>
                                  <div class="headline-post headline-md"></div>

                              </div>';
                	}
                }
                return $hasil;
            }

    public function get_berita_web()
    {
      $hasil="";
  		$w = $this->db->query("SELECT * FROM tbl_berita a LEFT JOIN  tbl_user b ON a.id_user_update=b.id_user WHERE aktif='1' ORDER BY a.id_berita DESC");
  		$i = 1;
  		if(($w->num_rows())<=0)
  		{
                      $hasil .= '<div class="alert alert-block alert-danger fade in">
                                    <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                </div>';
          }else{

          	foreach ($w->result() as $h) {
          		$hasil .= '<div class="blog margin-bottom-20">
                            <h2><a href="'.base_url().'berita/'.$h->url.'/">'.$h->judul_berita.'</a></h2>
                            <div class="headline-post headline-md"></div>
                            <div class="blog-post-tags">
                                <ul class="list-unstyled list-inline blog-info">
                                    <li><i class="fa fa-calendar tooltips" title="Tanggal"></i> '.$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish).'</li>
                                    <li><i class="fa fa-clock-o tooltips" title="Pukul"></i> '.$this->pondokkode_model_admin->jam_format($h->tgl_publish).'</li>
                                    <li><i class="fa fa-user tooltips" title="Penulis"></i> '.$h->nama_user.'</li>
                                    <li><i class="fa fa-eye tooltips" title="Dilihat"></i> Dilihat '.$h->dilihat.' Kali</li>
                                </ul>
                            </div>
                            <div class="headline-post headline-md"></div>
                            <p>'.strip_tags(substr($h->isi_berita,0,800)).'...</p>
                            <p><a class="btn-u btn-u-small" href="'.base_url().'berita/'.$h->url.'/"> Baca Selengkapnya <i class="icon-arrow-right"></i></a></p>
                            <br>
                            <div class="headline-post headline-md"></div>

                        </div>';
                  if($i++ ==3)
          			break;
          	}
          }
          return $hasil;
    }

    public function get_pengumuman_sidebar()
    {
      $hasil="";
  		$w = $this->db->query("SELECT * FROM tbl_pengumuman a LEFT JOIN  tbl_user b ON a.id_user_update=b.id_user WHERE aktif='1' ORDER BY a.id_pengumuman DESC");
  		$i = 1;
  		if(($w->num_rows())<=0)
  		{
                      $hasil .= '<div class="alert alert-block alert-danger fade in">
                                    <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                </div>';
          }else{

          	foreach ($w->result() as $h) {
          		$hasil .= '<a href="'.base_url().'pengumuman/'.$h->url.'/"><i class="icon-arrow-right"></i> '.$h->judul_pengumuman.'</a><br>
                         <small><i class="fa fa-calendar-o"></i> '.$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish).' <i class="fa fa-clock-o"></i> '.$this->pondokkode_model_admin->jam_format($h->tgl_publish).' <i class="fa fa-eye"></i> Dilihat '.$h->dilihat.' Kali </small>
                        <div class="headline-sidebar headline-md"></div>';
                  if($i++ ==3)
          			break;
          	}
          }
          return $hasil;
    }

    public function get_agenda_sidebar()
    {
      $hasil="";
  		$w = $this->db->query("SELECT * FROM tbl_agenda a LEFT JOIN  tbl_user b ON a.id_user_update=b.id_user WHERE aktif='1' ORDER BY a.id_agenda DESC");
  		$i = 1;
  		if(($w->num_rows())<=0)
  		{
                      $hasil .= '<div class="alert alert-block alert-danger fade in">
                                    <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                </div>';
          }else{

          	foreach ($w->result() as $h) {
          		$hasil .= '<a href="'.base_url().'agenda/'.$h->url.'/"><i class="icon-arrow-right"></i> '.$h->judul_agenda.'</a><br>
                         <small><i class="fa fa-calendar-o"></i> '.$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish).' <i class="fa fa-clock-o"></i> '.$this->pondokkode_model_admin->jam_format($h->tgl_publish).' <i class="fa fa-eye"></i> Dilihat '.$h->dilihat.' Kali </small>
                        <div class="headline-sidebar headline-md"></div>';
                  if($i++ ==3)
          			break;
          	}
          }
          return $hasil;
    }

    public function get_agenda_siswa()
    {
      $hasil="";
  		$w = $this->db->query("SELECT * FROM tbl_agenda a LEFT JOIN  tbl_user b ON a.id_user_update=b.id_user WHERE aktif='1' ORDER BY a.id_agenda DESC");
  		$i = 1;
  		if(($w->num_rows())<=0)
  		{
                      $hasil .= '<div class="alert alert-block alert-danger fade in">
                                    <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                </div>';
          }else{

          	foreach ($w->result() as $h) {
          		$hasil .= '<div class="profile-event">
                            <div class="date-formats">
                                <span>'.$this->pondokkode_model_admin->tgl_tunggal($h->tgl_publish).'</span>
                                <small>'.$this->pondokkode_model_admin->tgl_mont_year($h->tgl_publish).'</small>
                            </div>
                            <div class="overflow-h">
                                <h3 class="heading-xs"><a href="'.base_url().'agenda/'.$h->url.'/">'.$h->judul_agenda.'</a></h3>
                                <p><i class="fa fa-user"></i>  '.$h->nama_user.' <i class="fa fa-eye"></i> Dilihat '.$h->dilihat.' Kali</p>
                            </div>
                            </div>';
                  if($i++ ==6)
          			break;
          	}
          }
          return $hasil;
    }

    public function get_pengumuman_siswa()
    {
      $hasil="";
  		$w = $this->db->query("SELECT * FROM tbl_pengumuman a LEFT JOIN  tbl_user b ON a.id_user_update=b.id_user WHERE aktif='1' ORDER BY a.id_pengumuman DESC");
  		$i = 1;
  		if(($w->num_rows())<=0)
  		{
                      $hasil .= '<div class="alert alert-block alert-danger fade in">
                                    <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                </div>';
          }else{

          	foreach ($w->result() as $h) {
          		$hasil .= '<div class="profile-post color-one">
                          <span class="profile-post-numb"></span>
                                <div class="profile-post-in">
                                      <h3 class="heading-xs"><a href="'.base_url().'pengumuman/'.$h->url.'">'.$h->judul_pengumuman.'</a></h3>
                                      <p><i class="fa fa-user"></i>  '.$h->nama_user.' <i class="fa fa-eye"></i> Dilihat '.$h->dilihat.' Kali</p>
                                  </div>
                          </div>';
                  if($i++ ==6)
          			break;
          	}
          }
          return $hasil;
    }

    public function get_beita_populer()
    {
      $hasil="";
  		$w = $this->db->query("SELECT * FROM tbl_berita a LEFT JOIN  tbl_user b ON a.id_user_update=b.id_user WHERE aktif='1' AND dilihat > 15  ORDER BY a.id_berita DESC");
  		$i = 1;
  		if(($w->num_rows())<=0)
  		{
                      $hasil .= '<div class="alert alert-block alert-danger fade in">
                                    <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                </div>';
          }else{

          	foreach ($w->result() as $h) {
          		$hasil .= '<a href="'.base_url().'berita/'.$h->url.'/"><i class="icon-arrow-right"></i> '.$h->judul_berita.'</a><br>
                         <small><i class="fa fa-calendar-o"></i> '.$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish).' <i class="fa fa-clock-o"></i> '.$this->pondokkode_model_admin->jam_format($h->tgl_publish).' <i class="fa fa-eye"></i> Dilihat '.$h->dilihat.' Kali </small>
                        <div class="headline-sidebar headline-md"></div>';
                  if($i++ ==3)
          			break;
          	}
          }
          return $hasil;
    }

    public function get_artikel_populer()
    {
      $hasil="";
  		$w = $this->db->query("SELECT * FROM tbl_artikel a LEFT JOIN  tbl_user b ON a.id_user_update=b.id_user WHERE aktif='1' AND dilihat > 15  ORDER BY a.id_artikel DESC");
  		$i = 1;
  		if(($w->num_rows())<=0)
  		{
                      $hasil .= '<div class="alert alert-block alert-danger fade in">
                                    <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                </div>';
          }else{

          	foreach ($w->result() as $h) {
          		$hasil .= '<a href="'.base_url().'artikel/'.$h->url.'/"><i class="icon-arrow-right"></i> '.$h->judul_artikel.'</a><br>
                        <small><i class="fa fa-calendar-o"></i> '.$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish).' <i class="fa fa-clock-o"></i> '.$this->pondokkode_model_admin->jam_format($h->tgl_publish).' <i class="fa fa-eye"></i> Dilihat '.$h->dilihat.' Kali </small>
                        <div class="headline-sidebar headline-md"></div>';
                  if($i++ ==3)
          			break;
          	}
          }
          return $hasil;
    }

    public function get_file($filter=array())
    {
      $hasil="";
      $data_file = $filter['data_file'];
      $query_add = " WHERE a.judul_file like '%".$data_file."%'";

  		$w = $this->db->query("SELECT * FROM tbl_file as a JOIN tbl_user as b ON a.id_user_update=b.id_user ".$query_add."  ORDER BY a.id_file DESC");
  		if(($w->num_rows())<=0)
  		{
                      $hasil .= '<div class="alert alert-block alert-danger fade in">
                                    <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                </div>';
          }else{
            $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                                  <thead class="flip-content">
                                  <tr>
                                  <th class="text-center">No.</th>
                                  <th class="text-center">Judul</th>
                                  <th class="text-center">Author</th>
                                  <th class="text-center">Date Upload</th>
                                  <th class="text-center">Download</th>
                                  </tr>
                                  </thead><tbody>';
            $no = 1;
          	foreach ($w->result() as $h) {
              $hasil .= " <tr>
                            <td class='text-center'>".$no."</td>
                            <td>".$h->judul_file."</td>
                            <td>".$h->nama_user."</td>
                            <td class='text-center'>".$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish)." ".$this->pondokkode_model_admin->jam_format($h->tgl_publish)."</td>
                            <td class='text-center'><a href='".base_url()."assets/file_download/".$h->nama_file."' class='btn btn-u' style='color:#fff'><i class='fa fa-cloud-download'></i> Download</a></td>";
                          $hasil .= "</td></tr>";
                          $no++;
              }
              $hasil .= '</tbody></table>';
                        }
          return $hasil;
    }

    public function get_guru($limit,$offset,$filter=array())
    {
          $hasil = "";
          $data_guru = $filter['data_guru'];
          $tot_hal = $this->db->query("SELECT * FROM tbl_guru as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.nama LIKE '%".$data_guru."%' ORDER BY a.nama ASC");
          $config['base_url'] = base_url() . 'akademik/guru/page/';
          $config['total_rows'] = $tot_hal->num_rows();
          $config['per_page'] = $limit=20;
          $config['uri_segment'] = 4;
          $config['first_link'] = 'Pertama';
          $config['last_link'] = 'Terakhir';
          $config['next_link'] = '<i class="icon-control-forward"></i>';
          $config['prev_link'] = '<i class="icon-control-rewind"></i>';
          $this->pagination->initialize($config);
          $w = $this->db->query("SELECT * FROM tbl_guru as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.nama LIKE '%".$data_guru."%' ORDER BY a.nama ASC LIMIT ".$offset.",".$limit."");
          if(($w->num_rows())<=0)
          {
              $hasil .='<div class="alert alert-block alert-danger fade in">
                          <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                        </div>';
          }else{
            $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                                  <thead class="flip-content">
                                  <tr>
                                  <th class="text-center">No.</th>
                                  <th class="text-center">NIP</th>
                                  <th class="text-center">nama</th>
                                  <th class="text-center">Jabatan</th>
                                  <th class="text-center">Jenis Kelamin</th>
                                  <th class="text-center">Detail</th>
                                  </tr>
                                  </thead><tbody>';
            $no = 1;
            foreach ($w->result() as $h) {
              $hasil .= "<tr>
                            <td class='text-center'>".$no."</td>
                            <td class='text-center'>".$h->nip."</td>
                            <td class='text-center'>".$h->nama."</td>
                            <td>".$h->jabatan."</td>
                            <td class='text-center'>".$h->jenis_kelamin."</td>
                            <td class='text-center'>
                            <a class='btn-u btn-u-xs btn-u tooltips' title='Detail Guru' data-placement='right' href='".base_url()."akademik/guru/detail/".$this->encryption->encode($h->nip)."'> Detail <i class='icon-action-redo'></i> </a>
                            </td>";
                          $hasil .= "</td></tr>";
              $no++;
            }
            $hasil .= '</tbody></table>';
          }
          return $hasil;
      }

    public function get_siswa($limit,$offset,$filter=array())
    {
          $hasil = "";
          $data_siswa = $filter['data_siswa'];
          $tot_hal = $this->db->query("SELECT * FROM tbl_siswa as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.nama LIKE '%".$data_siswa."%' ORDER BY a.nama ASC");
          $config['base_url'] = base_url() . 'akademik/siswa/page/';
          $config['total_rows'] = $tot_hal->num_rows();
          $config['per_page'] = $limit=20;
          $config['uri_segment'] = 4;
          $config['first_link'] = 'Pertama';
          $config['last_link'] = 'Terakhir';
          $config['next_link'] = '<i class="icon-control-forward"></i>';
          $config['prev_link'] = '<i class="icon-control-rewind"></i>';
          $this->pagination->initialize($config);
          $w = $this->db->query("SELECT * FROM tbl_siswa as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.nama LIKE '%".$data_siswa."%' ORDER BY a.nama ASC LIMIT ".$offset.",".$limit."");
          if(($w->num_rows())<=0)
          {
              $hasil .='<div class="alert alert-block alert-danger fade in">
                          <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                        </div>';
          }else{
            $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                                  <thead class="flip-content">
                                  <tr>
                                  <th class="text-center">No.</th>
                                  <th class="text-center">NISN</th>
                                  <th class="text-center">NIS</th>
                                  <th class="text-center">nama</th>
                                  <th class="text-center">Kelas</th>
                                  <th class="text-center">Jenis Kelamin</th>
                                  <th class="text-center">Detail</th>
                                  </tr>
                                  </thead><tbody>';
            $no = 1;
            foreach ($w->result() as $h) {
              $hasil .= "<tr>
                            <td class='text-center'>".$no."</td>
                            <td class='text-center'>".$h->nisn."</td>
                            <td class='text-center'>".$h->nis."</td>
                            <td>".$h->nama."</td>
                            <td class='text-center'>".$h->kelas."</td>
                            <td class='text-center'>".$h->jenis_kelamin."</td>
                            <td class='text-center'>
                            <a class='btn-u btn-u-xs btn-u tooltips' title='Detail Siswa' data-placement='right' href='".base_url()."akademik/siswa/detail/".$this->encryption->encode($h->nisn)."'> Detail <i class='icon-action-redo'></i> </a>
                            </td>";
                          $hasil .= "</td></tr>";
              $no++;
            }
            $hasil .= '</tbody></table>';
          }
          return $hasil;
      }

    public function get_album()
    {
          $hasil="";
              $w = $this->db->query("SELECT nama_album FROM tbl_album ORDER BY id_album ASC");
              $hasil .= '<div id="filters-container" class="cbp-l-filters-text content-xs">
                              <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> ALL </div> |';
              foreach($w->result() as $h)
              {
                  $hasil .= '<div data-filter=".'.url_title(strtolower($h->nama_album)).'" class="cbp-filter-item"> '.$h->nama_album.' </div> |';
              }
          $hasil .= '</div>';
          return $hasil;
     }

     public function get_foto_galeri()
     {
         $hasil="";
             $w = $this->db->query("SELECT * FROM tbl_foto_galeri a LEFT JOIN tbl_album b ON a.album_id=b.id_album ORDER BY a.id_foto_galeri DESC");
             foreach($w->result() as $h)
             {
                 $hasil .= '<div class="cbp-item '.url_title(strtolower($h->nama_album)).'">
                             <div class="cbp-caption margin-bottom-20">
                                 <div class="cbp-caption-defaultWrap">
                                     <img src="'.base_url().'assets/foto_galeri/'.url_title(strtolower($h->nama_album)).'/'.$h->foto_galeri.'" alt="">
                                 </div>
                                 <div class="cbp-caption-activeWrap">
                                     <div class="cbp-l-caption-alignCenter">
                                         <div class="cbp-l-caption-body">
                                             <ul class="link-captions no-bottom-space">
                                                 <li><a href="'.base_url().'assets/foto_galeri/'.url_title(strtolower($h->nama_album)).'/'.$h->foto_galeri.'" class="cbp-lightbox" data-title="'.$h->caption_foto.'"><i class="rounded-x fa fa-search"></i></a></li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="cbp-title-dark">
                                 <div class="cbp-l-grid-agency-title">'.$h->nama_album.'</div>
                                 <div class="cbp-l-grid-agency-desc">'.$h->caption_foto.'</div>
                             </div>
                         </div>';
             }
         return $hasil;
     }

     public function get_materi_ajar_one()
     {
       $hasil="";
       $session = $this->session->userdata("nip");
   		$w = $this->db->query("SELECT * FROM tbl_learning as a JOIN tbl_mapel as b ON a.mapel_id=b.id_mapel WHERE a.type='materi_ajar' AND a.guru_id='$session'");
   		if(($w->num_rows())<=0)
   		{
                       $hasil .= '<div class="alert alert-block alert-danger fade in">
                                     <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                 </div>';
           }else{
             $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                                   <thead class="flip-content">
                                   <tr>
                                   <th class="text-center">No.</th>
                                   <th class="text-center">Judul</th>
                                   <th class="text-center">Mata Pelajaran</th>
                                   <th class="text-center">Date Upload</th>
                                   <th class="text-center">Option</th>
                                   </tr>
                                   </thead><tbody>';
             $no = 1;
           	foreach ($w->result() as $h) {
               $hasil .= " <tr>
                             <td class='text-center'>".$no."</td>
                             <td class='text-center' style='vertical-align: middle;'><a href='".base_url()."assets/e-learning/materi-ajar/".$h->file."' title='".$h->judul."'>$h->judul</a></td>
                             <td class='text-center'>".$h->nama_mapel."</td>
                             <td class='text-center'>".$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish)." ".$this->pondokkode_model_admin->jam_format($h->tgl_publish)."</td>
                             <td class='text-center'><a href='".base_url()."akademik/guru/materi-ajar/delete/".$this->encryption->encode($h->id_learning)."/".$h->file."' class='btn btn-danger btn-xs' style='color:#fff'><i class='fa fa-trash-o'></i> Delete</a></td>";
                           $hasil .= "</td></tr>";
                           $no++;
               }
               $hasil .= '</tbody></table>';
                         }
           return $hasil;
     }

     public function get_materi_uji_one()
     {
       $hasil="";
       $session = $this->session->userdata("nip");
   		$w = $this->db->query("SELECT * FROM tbl_learning as a JOIN tbl_mapel as b ON a.mapel_id=b.id_mapel WHERE a.type='materi_uji' AND a.guru_id='$session'");
   		if(($w->num_rows())<=0)
   		{
                       $hasil .= '<div class="alert alert-block alert-danger fade in">
                                     <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                 </div>';
           }else{
             $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                                   <thead class="flip-content">
                                   <tr>
                                   <th class="text-center">No.</th>
                                   <th class="text-center">Judul</th>
                                   <th class="text-center">Mata Pelajaran</th>
                                   <th class="text-center">Date Upload</th>
                                   <th class="text-center">Option</th>
                                   </tr>
                                   </thead><tbody>';
             $no = 1;
           	foreach ($w->result() as $h) {
               $hasil .= " <tr>
                             <td class='text-center'>".$no."</td>
                             <td class='text-center' style='vertical-align: middle;'><a href='".base_url()."assets/e-learning/materi-uji/".$h->file."' title='".$h->judul."'>$h->judul</a></td>
                             <td class='text-center'>".$h->nama_mapel."</td>
                             <td class='text-center'>".$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish)." ".$this->pondokkode_model_admin->jam_format($h->tgl_publish)."</td>
                             <td class='text-center'><a href='".base_url()."akademik/guru/materi-uji/delete/".$this->encryption->encode($h->id_learning)."/".$h->file."' class='btn btn-danger btn-xs' style='color:#fff'><i class='fa fa-trash-o'></i> Delete</a></td>";
                           $hasil .= "</td></tr>";
                           $no++;
               }
               $hasil .= '</tbody></table>';
                         }
           return $hasil;
     }

     public function get_materi_ajar_siswa()
     {
       $hasil="";
   		$w = $this->db->query("SELECT * FROM tbl_learning as a JOIN tbl_mapel as b ON a.mapel_id=b.id_mapel JOIN tbl_guru as c ON a.guru_id=c.nip WHERE a.type='materi_ajar' ORDER BY a.id_learning ASC");
      $i = 1;
      if(($w->num_rows())<=0)
   		{
                       $hasil .= '<div class="alert alert-block alert-danger fade in">
                                     <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                 </div>';
           }else{
             $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                                   <thead class="flip-content">
                                   <tr>
                                   <th class="text-center">No.</th>
                                   <th class="text-center">Judul Materi</th>
                                   <th class="text-center">Mata Pelajaran</th>
                                   <th class="text-center">Guru Pengampu</th>
                                   <th class="text-center">Date Upload</th>
                                   <th class="text-center">Download</th>
                                   </tr>
                                   </thead><tbody>';
             $no = 1;
           	foreach ($w->result() as $h) {
              if($this->session->userdata('nisn')== "" && $this->session->userdata('nip')== "" && $this->session->userdata('user_id')== "")
              {
                $download = "<td class='text-center'><button class='btn btn-u btn-u disabled' type='button' disabled='disabled'><i class='fa fa-cloud-download'></i> Download</button></td>";
              }else{
                $download = "<td class='text-center'><a href='".base_url()."assets/e-learning/materi-ajar/".$h->file."' class='btn btn-u' style='color:#fff'><i class='fa fa-cloud-download'></i> Download</a></td>";
              }
               $hasil .= " <tr>
                             <td class='text-center'>".$no."</td>
                             <td class='text-center' style='vertical-align: middle;'>$h->judul</td>
                             <td class='text-center'>".$h->nama_mapel."</td>
                             <td class='text-center'>".$h->nama."</td>
                             <td class='text-center'>".$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish)." ".$this->pondokkode_model_admin->jam_format($h->tgl_publish)."</td>
                             $download";
                           $hasil .= "</td></tr>";
                           $no++;
                           if($i++ ==5)
                           break;
               }
               $hasil .= '</tbody></table>';
                         }
           return $hasil;
     }

     public function get_materi_uji_siswa()
     {
       $hasil="";
   		$w = $this->db->query("SELECT * FROM tbl_learning as a JOIN tbl_mapel as b ON a.mapel_id=b.id_mapel JOIN tbl_guru as c ON a.guru_id=c.nip WHERE type='materi_uji' ORDER BY a.id_learning ASC");
      $i = 1;
      if(($w->num_rows())<=0)
   		{
                       $hasil .= '<div class="alert alert-block alert-danger fade in">
                                     <strong><i class="fa fa-exclamation-circle"></i> Message ! </strong> : Tidak Ada Data Yang Ditemukan
                                 </div>';
           }else{
             $hasil .= ' <table class="table table-bordered orange table-striped table-condensed flip-content">
                                   <thead class="flip-content">
                                   <tr>
                                   <th class="text-center">No.</th>
                                   <th class="text-center">Judul Materi</th>
                                   <th class="text-center">Mata Pelajaran</th>
                                   <th class="text-center">Guru Pengampu</th>
                                   <th class="text-center">Date Upload</th>
                                   <th class="text-center">Download</th>
                                   </tr>
                                   </thead><tbody>';
             $no = 1;
           	foreach ($w->result() as $h) {
              if($this->session->userdata('nisn')== "" && $this->session->userdata('nip')== "" && $this->session->userdata('user_id')== "")
              {
                $download = "<td class='text-center'><button class='btn btn-u btn-u disabled tooltips' title='Login untuk download' data-placement='right' type='button' disabled='disabled'><i class='fa fa-cloud-download'></i> Download</button></td>";
              }else{
                $download = "<td class='text-center'><a href='".base_url()."assets/e-learning/materi-uji/".$h->file."' class='btn btn-u' style='color:#fff'><i class='fa fa-cloud-download'></i> Download</a></td>";
              }
               $hasil .= " <tr>
                             <td class='text-center'>".$no."</td>
                             <td class='text-center' style='vertical-align: middle;'>$h->judul</td>
                             <td class='text-center'>".$h->nama_mapel."</td>
                             <td class='text-center'>".$h->nama."</td>
                             <td class='text-center'>".$this->pondokkode_model_admin->tgl_indo_no_hari($h->tgl_publish)." ".$this->pondokkode_model_admin->jam_format($h->tgl_publish)."</td>
                             $download";
                           $hasil .= "</td></tr>";
                           $no++;
                           if($i++ ==5)
                           break;
               }
               $hasil .= '</tbody></table>';
                         }
           return $hasil;
     }

    function get_menu($id_menu)
    {
        $query = $this->db->query("SELECT * FROM tbl_menu as a JOIN tbl_user as b on a.id_user_update = b.id_user WHERE id_menu = '$id_menu'");
        return $query;
    }	

    function get_pages($id_pages)
    {
        $query = $this->db->query("SELECT * FROM tbl_pages as a JOIN tbl_user as b on a.id_user_update = b.id_user WHERE id_pages = '$id_pages'");
        return $query;
    }		
	 
    function get_detail_berita($url)
    {
      $query = $this->db->query("SELECT * FROM tbl_berita as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.aktif='1' AND a.url='$url'");

      if($query->num_rows() > 0)
  		{
  			return $query->row();
  		}else
  		{
  			return NULL;
  		}
    }

    function get_detail_artikel($url)
    {
      $query = $this->db->query("SELECT * FROM tbl_artikel as a JOIN tbl_kategori as b ON a.kategori_artikel=b.id_kategori JOIN tbl_user as c ON a.id_user_update=c.id_user WHERE a.aktif='1' AND a.url='$url'");

      if($query->num_rows() > 0)
  		{
  			return $query->row();
  		}else
  		{
  			return NULL;
  		}
    }

    function get_detail_agenda($url)
    {
      $query = $this->db->query("SELECT * FROM tbl_agenda as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.aktif='1' AND a.url='$url'");

      if($query->num_rows() > 0)
  		{
  			return $query->row();
  		}else
  		{
  			return NULL;
  		}
    }

    function get_detail_pengumuman($url)
    {
      $query = $this->db->query("SELECT * FROM tbl_pengumuman as a JOIN tbl_user as b ON a.id_user_update=b.id_user WHERE a.aktif='1' AND a.url='$url'");

      if($query->num_rows() > 0)
  		{
  			return $query->row();
  		}else
  		{
  			return NULL;
  		}
    }

    public function counter_visitor()
    {
        setcookie("pengunjung", "sudah berkunjung", time()+60*60*24);
            if (!isset($_COOKIE["pengunjung"])) {
                $d_in['ip_address'] = $_SERVER['REMOTE_ADDR'];
                $d_in['date_visit'] = date("Y-m-d H:i:s");
                $this->db->insert("tbl_counter",$d_in);
            }
    }

}
