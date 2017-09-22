<?php
namespace Zayso\User;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;

class User implements AdvancedUserInterface, \Serializable
{

    // These should be all be private but phpstorm complains when they are unused
    protected $id;
    private   $name;
    protected $email;
    private   $username;

    private   $salt;
    private   $password;
    protected $passwordToken;

    private $enabled = true;
    private $locked  = false;
    
    private $roles = ['ROLE_USER'];
    
    protected $personKey;
    protected $projectKey;
    protected $registered;

    static private $keys = [
        'id'            => 'int',
        'name'          => 'string',
        'email'         => 'string',
        'username'      => 'string',
        'salt'          => 'string',
        'password'      => 'string',
        'passwordToken' => 'string',
        'enabled'       => 'bool',
        'locked'        => 'bool',
        'roles'         => 'array',
        'personKey'     => 'guid',
        'projectKey'    => 'guid',
        'registered'    => 'bool', // true false null?
    ];
    static public function createFromArray(array $data) : User
    {
        $item = new self();

        foreach (self::$keys as $key => $type) {
            if (isset($data[$key])) { // fails on NULL
                switch($type) {
                    case 'int':
                        $item->$key = (integer)$data[$key];
                        break;
                    case 'bool':
                        $item->$key = (boolean)$data[$key];
                        break;
                    default:
                        $item->$key = $data[$key];
                }
            }
        }
        return $item;
    }
    // These are needed to support the user interface
    public function getRoles()
    {
        return $this->roles;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getSalt()
    {
        return $this->salt;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function eraseCredentials()
    {
    }
    public function isEnabled()
    {
        return $this->enabled;
    }
    public function isAccountNonLocked()
    {
        return $this->locked ? false : true;
    }
    public function isAccountNonExpired()
    {
        return true;
    }
    public function isCredentialsNonExpired()
    {
        return true;
    }
    // For ng2014 code
    public function getAccountName()
    {
        return $this->name;
    }
    public function serialize()
    {
        return serialize(array(
            $this->id,         // For refreshing
            //$this->salt,
            //$this->password,
            $this->username,   // Debugging
        ));
    }
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);

        list(
            $this->id,
            //$this->salt,
            //$this->password,
            $this->username
            ) = $data;

        return;
    }
    public function getProjectId()
    {
        return $this->projectKey;
    }
    public function getPersonId()
    {
        return $this->personKey;
    }
    public function getPersonName()
    {
        return $this->name;
    }
    public function getRegPersonId()
    {
        return $this->projectKey . ':' . $this->personKey;
    }
}
