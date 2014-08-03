<?php
class EditUserTest extends TestCase {
	public function testEditUserPage() {
		$crawler = $this->action('GET', 'UsersController@showProfile', ['id' => 1]);
		
		$this->assertViewHas('user');
		$this->assertTrue($this->client->getResponse()->isOk());
	}
}
?>
