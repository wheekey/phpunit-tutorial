<?php

class UserTest extends \PHPUnit\Framework\TestCase
{
    protected $user;

    public function setUp(): void
    {
        $this->user = new \App\Models\User();

    }

    /** @test */
    public function that_we_can_get_the_first_name()
    {
        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastname()
    {

        $this->user->setLastName('ERm');

        $this->assertEquals($this->user->getLastName(), 'ERm');
    }

    public function testFullNameIsReturned()
    {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('ERm');

        $this->assertEquals($this->user->getFullName(), 'Billy ERm');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
        $this->user->setFirstName('  Billy   ');
        $this->user->setLastName('   ERm');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
        $this->assertEquals($this->user->getLastName(), 'ERm');
    }

    public function testEmailAddressCanBeSet()
    {
        $this->user->setEmail('billy@code.com');

        $this->assertEquals($this->user->getEmail(), 'billy@code.com');

    }

    public function testEmailVariableContainCorrectValues()
    {
        $this->user->setFirstName('Billy');
        $this->user->setLastName('ERm');
        $this->user->setEmail('billy@code.com');

        $emailVariables = $this->user->getEmailVariables();

        $this->assertArrayHasKey('full_name', $emailVariables);
        $this->assertArrayHasKey('email', $emailVariables);

        $this->assertEquals($emailVariables['full_name'], 'Billy ERm');
        $this->assertEquals($emailVariables['email'], 'billy@code.com');
    }


}