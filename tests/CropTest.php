<?php

use PHPUnit\Framework\TestCase;
use Bees\Crop;
use Bees\Entity\Hive;
use Bees\Entity\Character\Player;

class CropTest extends TestCase {

    /**
     * Test crop is on put out fire status
     */
    public function testCropStatus(): void {
        $playerMock = $this->getMockBuilder(Player::class)->getMock();
        $hiveMock = $this->getMockBuilder(Hive::class)->getMock();

        $crop = new Crop($playerMock, $hiveMock);
        $this->assertEquals(Crop::PUT_OUT_FIRE, $crop->getStatus());
    }
}