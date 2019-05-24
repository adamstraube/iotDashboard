<?php
declare(strict_types=1);

namespace Tests\Unit\Controllers\Auth;

use App\Database\Entities\User;
use App\Http\Controllers\Auth\RegisterController;
use Tests\Base\TestCase;

/**
 * @covers \App\Http\Controllers\Auth\RegisterController
 */
class RegisterControllerTest extends TestCase
{
    /**
     * Test if a new user can be created
     *
     * @return void
     *
     * @throws \Exception
     */
    public function testCanLogin(): void
    {
        $registerUser = $this->getMethod('create');

        $this->assertTrue($loginFunction);
    }

    /**
     * Generates user details and persists in DB for test
     *
     * @return User
     *
     * @throws \Exception
     */
    private function generateUserDetails(): User
    {
        $username = 'testUser';
        $password = random_bytes(8);
        $email = 'test@test.com';

        $user = new User([
            'name' => $username,
            'password' => $password,
            'email' => $email
        ]);
        return $user;
    }

    /**
     * Class Reflection - Used to test protected methods in external classes
     *
     * @param $name
     *
     * @return \ReflectionMethod
     * @throws \ReflectionException
     */
    protected static function getMethod($name) {
        $class = new \ReflectionClass('RegisterController');
        $method = $class->getMethod($name);
        $method->setAccessible(true);
        return $method;
    }
}