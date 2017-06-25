<?php
class admin
{
    public $Id,$TenDangNhap,$MatKhau;
    public function admin($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->TenDangNhap=isset($data['TenDangNhap'])?$data['TenDangNhap']:'';
    $this->MatKhau=isset($data['MatKhau'])?$data['MatKhau']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->TenDangNhap=addslashes($this->TenDangNhap);
            $this->MatKhau=addslashes($this->MatKhau);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->TenDangNhap=stripslashes($this->TenDangNhap);
            $this->MatKhau=stripslashes($this->MatKhau);
        }
}
