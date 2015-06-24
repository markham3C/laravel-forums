<?php

namespace BishopB\Forum;

class UserRole extends BaseModel
{

    // definitions
    protected $table = 'GDN_UserRole';

    // relationships
    public function role()
    {
        return $this->hasOne(
            '\BishopB\Forum\Role', 'RoleID', 'RoleID'
        );
    }
	
	public function user()
    {
        return $this->hasOne(
            '\BishopB\Forum\User', 'UserID', 'UserID'
        );
    }
}
