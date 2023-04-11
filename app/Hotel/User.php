<?php
namespace Hotel;
use PDO;

class User{
    
    const TOKEN_KEY = 'safdsfhfsdweh;fgfge5yaczvbnwetqw';
    
    private static $currentUserId;

    private $pdo;

    public function __construct(){
        $this->pdo = new PDO('mysql:host=127.0.0.1;dbname=hotel;charset=UTF8', 'thanosch', '123456789!', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"]);
        
    }
    protected function getPdo() {
        return $this->pdo;
    }
    public function getByEmail($email){
        $statement = $this->getPdo()->prepare('SELECT * FROM user WHERE email=:email');
        $statement ->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }
    public function getUsers(){
        $statement = $this->getPdo()->prepare('SELECT * FROM user');
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($name, $email, $password){
        $statement = $this->getPdo()->prepare('INSERT INTO user(name, email, password) VALUES (:name, :email, :password)');
        
        //Hash password
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        
        $statement ->bindParam(':name', $name, PDO::PARAM_STR);
        $statement ->bindParam(':email', $email, PDO::PARAM_STR);
        $statement ->bindParam(':password', $passwordHash, PDO::PARAM_STR);

        $statement->execute();


    }

    public function verify($email, $password){
        $user = $this-> getByEmail($email);

        return password_verify($password, $user['password']);
    }

    public function generateToken($userId){

        //Create token payload
        $payload = [
            'user_id'=>$userId,
        ];
        $payloadEncoded = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', $payloadEncoded, self::TOKEN_KEY);

        return sprintf('%s.%s', $payloadEncoded, $signature);
    }
    public function getTokenPayload($token){
        //Get payload and signature
        [$payloadEncoded]= explode('.', $token);

        //Get payload
        return json_decode(base64_decode($payloadEncoded), true);

    }
    public function verifyToken($token){
        //Get payload
        $payload = $this->getTokenPayload($token);
        $userId = $payload['user_id'];

        //Generate signature and verify
        return $this->generateToken($userId) == $token;
    }
    public static function getCurrentUserId(){
        return self::$currentUserId;
    }
    public static function setCurrentUserId($userId){
        
        self::$currentUserId = $userId;
    }
}
