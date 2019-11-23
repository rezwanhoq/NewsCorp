
<?php

use PHPUnit\Framework\TestCase;

require __DIR__ . "/../Poker.php";

class pokerTest extends TestCase {

    public function testShuffleCards() {
        $p = new poker();

        $result = $p->shuffleCards();
        $duplicateValues = count($result) !== count(array_unique($result));
        $this->assertIsArray($result, "The result is not an Array");
        $this->assertEquals(5, count($result), "Expected 5 cards");
        $this->assertEquals(false, $duplicateValues, "Duplicate Cards idendified");
    }

    public function testStraightOrStraightFlush() {

        $cards = new poker();
        $testCards[0] = array('2d', '3d', '4d', '5d', '6d');
        $testCards[1] = array('2d', '3h', '4d', '5h', '6d');
        $testCards[2] = array('aj', 'kj', 'qc', 'jd', '10c');
        $testCards[3] = array('ac', 'kc', 'qc', 'jc', '10c');
        $testCards[4] = array('ad', '2d', '3d', '4d', '5d');
        $testCards[5] = array('ad', '2c', '3h', '4s', '5d');

        foreach ($testCards as $value) {
            $result = $cards->straightOrStraightFlush($value);
            $this->assertEquals(True, $result, 'Its not a Straight/StraightFlush');
        }
    }

    public function testNotStraight() {

        $cards = new poker();
        
        $testCards[0] = array('2d', '10d', '4d', '5d', '6d');
        $testCards[1] = array('2d', '5h', '8d', '6h', '6d');
        $testCards[2] = array('2j', '2d', '2c', '2s', '10c');
        $testCards[3] = array('ac', 'kc', 'qc', 'jc', '9c');
        $testCards[4] = array('2a', 'ad', 'kc', 'qs', 'js');
        $testCards[5] = array('ad', '2c', '3h', '4s', 'kd');

        foreach ($testCards as $value) {
            $result = $cards->straightOrStraightFlush($value);
            $this->assertEquals(false, $result);
        }
    }

}
