<?php

namespace App\Traits;

use App\PersonalInformation;

trait HasPersonalInformation
{
    public function personalInformation()
    {
        return $this->belongsTo(PersonalInformation::class);
    }

    public function getShortNameAttribute()
    {
        //explode to obtain the first name.
        $name = explode(' ', trim($this->name));

        return $name[0].' '.$this->paternalSurname;
    }

    public function getFullNameAttribute()
    {
        return $this->personalInformation->name.' '.$this->personalInformation->paternal_surname.' '.$this->personalInformation->maternal_surname;
    }

    public function getNameAttribute()
    {
        return $this->personalInformation->name;
    }

    public function getPaternalSurnameAttribute()
    {
        return $this->personalInformation->paternal_surname;
    }

    public function getMaternalSurnameAttribute()
    {
        return $this->personalInformation->maternal_surname;
    }

    public function getSexAttribute()
    {
        return $this->personalInformation->sex;
    }

    public function getBirthdayAttribute()
    {
        return $this->personalInformation->birthday;
    }

    public function getRepresentAttribute()
    {
        return $this->personalInformation->represent;
    }

    public function getHousePhoneAttribute()
    {
        return $this->personalInformation->house_phone;
    }

    public function getMobilePhoneAttribute()
    {
        return $this->personalInformation->mobile_phone;
    }

    public function getFaxAttribute()
    {
        return $this->personalInformation->fax;
    }

    public function getStreetAttribute()
    {
        return $this->personalInformation->street;
    }

    public function getNumberAttribute()
    {
        return $this->personalInformation->number;
    }

    public function getInteriorAttribute()
    {
        return $this->personalInformation->interior;
    }

    public function getProfessionAttribute()
    {
        return $this->personalInformation->profession;
    }

    public function getColonyIdAttribute()
    {
        return $this->personalInformation->colony_id;
    }
}
