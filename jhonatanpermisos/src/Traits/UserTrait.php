<?php 

namespace Jhonatanfdez\JhonatanPermisos\Traits;

trait UserTrait {


    //es: desde aqui
    //en: from here

    public function roles(){
        
        return $this->belongsToMany('Jhonatanfdez\JhonatanPermisos\Models\Role')->withTimesTamps();

    }

    public function havePermission($permission){
        
        foreach ($this->roles as $role ) {
            
            if ($role['full-access'] =='yes' ) {
                return true;
            }

            foreach ($role->permissions as $perm) {
                
                if ($perm->slug == $permission ) {
                    return true;
                }   
            }



        }
        
        return false;
        //return $this->roles;
    }


}