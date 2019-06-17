<?php

namespace App\Tests;


use App\Entity\Trick;
use App\Entity\Picture;
use App\Form\AddTrickType;
use Symfony\Component\Form\Test\TypeTestCase;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AddTrickTypeTest extends TypeTestCase
{
    public function testSubmitValidData()
    {
        $picture = new Picture();
        $picture->setName('picture test');

        $formData = [
            'name' => 'BS 540 Seatbelt',
            'content' => 'Attraper aussi tranquillement l’arrière de la planche avec la main avant pendant un BS 5',
            'options' => new ArrayCollection([$picture])
        ];

        $trickToCompare = new Trick();
        $form = $this->factory->create(AddTrickType::class, $trickToCompare);

        $trick = new Trick();
        $trick->setName($formData['name']);
        $trick->setContent($formData['content']);

        $form->submit($formData);

        $this->assertTrue($form->isSynchronized());

        $this->assertEquals($trick, $trickToCompare);

        $view = $form->createView();
        $children = $view->children;

        foreach (array_keys($formData) as $key) {
            $this->assertArrayHasKey($key, $children);
        }
    }
}
