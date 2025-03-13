<?php
   namespace App\Test\Entity;
   use App\Entity\Persone;
   use PHPUnit\Framework\TestCase;
   class PersoneTest extends TestCase{
    public function testPersone(){
        $persone= new Persone('ahmed','aaa',19);
        $this-> assertSame("majeur",$persone->categorie());
    }
    public function testFille(){
        $persone= new Persone('iyed','akrimi',12);
        $this-> assertSame("mineur",$persone->categorie());
        
    }
    public function testInvalidage(){
        $p=new Persone('iyed','akrimi',-20);
        $this->expectException('Exception');
        $p->categorie();
    }
      /**
     * @dataProvider ageProvider
     */
    public function testCategorieParAge($age, $categorieAttendue) {
        $persone = new Persone('Nom', 'Prenom', $age);
        $this->assertSame($categorieAttendue, $persone->categorie());
    }

    public function ageProvider() {
        return [
            [12, "mineur"],   
            [19, "majeur"],   
            [10, "mineur"],  
            [20, "majeur"],  
            
        ];
    }
}