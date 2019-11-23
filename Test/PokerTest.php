
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

        foreach ($testCards as $value) {
            $result = $cards->straightOrStraightFlush($value);
            $this->assertEquals(True, $result, 'Its not a Straight/StraightFlush');
        }
    }

}
