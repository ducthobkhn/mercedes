<?php
class dangki
{
    public $Id,$Title,$Name,$Phone,$Email,$Region,$Created;
    public function dangki($data=array())
    {
    $this->Id=isset($data['Id'])?$data['Id']:'';
    $this->Title=isset($data['Title'])?$data['Title']:'';
    $this->Name=isset($data['Name'])?$data['Name']:'';
    $this->Phone=isset($data['Phone'])?$data['Phone']:'';
    $this->Email=isset($data['Email'])?$data['Email']:'';
    $this->Region=isset($data['Region'])?$data['Region']:'';
    $this->Created=isset($data['Created'])?$data['Created']:'';
          $this->encode();
    }
    public function encode()
        {
            $this->Id=addslashes($this->Id);
            $this->Title=addslashes($this->Title);
            $this->Name=addslashes($this->Name);
            $this->Phone=addslashes($this->Phone);
            $this->Email=addslashes($this->Email);
            $this->Region=addslashes($this->Region);
            $this->Created=addslashes($this->Created);
        }
    public function decode()
        {
            $this->Id=stripslashes($this->Id);
            $this->Title=stripslashes($this->Title);
            $this->Name=stripslashes($this->Name);
            $this->Phone=stripslashes($this->Phone);
            $this->Email=stripslashes($this->Email);
            $this->Region=stripslashes($this->Region);
            $this->Created=stripslashes($this->Created);
        }
}
