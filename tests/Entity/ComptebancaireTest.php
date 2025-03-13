<?php
namespace App\Test\Entity;

use App\Entity\Comptebancaire;
use PHPUnit\Framework\TestCase;

class ComptebancaireTest extends TestCase
{
    public function testRetirer(): void
    {
        $compteBancaire = new Comptebancaire('Iyed', 100); 
        $compteBancaire->setSolde(100); 
        $this->assertEquals(50, $compteBancaire->retirer(50));
    }
    public function testRetirerException(): void
    {
        $compteBancaire = new Comptebancaire('***', 10); 
        $compteBancaire->setSolde(100); 

        $this->expectException(\Exception::class);
        $compteBancaire->retirer(500); 
    }
}
?>
