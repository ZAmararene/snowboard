<?php

namespace App\Tests;


use App\Entity\Trick;
use App\Entity\Picture;
use App\Form\AddTrickType;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Component\Form\Test\TypeTestCase;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\PreloadedExtension;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bridge\Doctrine\Test\DoctrineTestHelper;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AddTrickTypeTest extends WebTestCase
{
    // private $em;

    // private $emRegistry;

    // protected function setUp()
    // {
    //     $this->em = DoctrineTestHelper::createTestEntityManager();
    //     $this->emRegistry = $this->createRegistryMock('default', $this->em);

    //     parent::setUp();

    //     $schemaTool = new SchemaTool($this->em);

    //     // This is the important part for you !
    //     $classes = [$this->em->getClassMetadata(Trick::class)];

    //     try {
    //         $schemaTool->dropSchema($classes);
    //     } catch (\Exception $e) { }

    //     try {
    //         $schemaTool->createSchema($classes);
    //     } catch (\Exception $e) { }
    // }
    // protected function createRegistryMock($name, $em)
    // {
    //     $registry = $this->getMockBuilder('Doctrine\Common\Persistence\ManagerRegistry')->getMock();
    //     $registry->expects($this->any())
    //         ->method('getManager')
    //         ->with($this->equalTo($name))
    //         ->will($this->returnValue($em));

    //     return $registry;
    // }

    // protected function getExtensions()
    // {
    //     return array_merge(parent::getExtensions(), array(
    //         new DoctrineOrmExtension($this->emRegistry),
    //     ));
    // }

    // protected function tearDown()
    // {
    //     parent::tearDown();

    //     $this->em = null;
    //     $this->emRegistry = null;
    // }

    // private $objectManager;

    // protected function setUp()
    // {
    //     $this->objectManager = $this->createMock(ObjectManager::class);

    //     parent::setUp();
    // }

    // protected function getExtensions()
    // {
    //     $addTrickType = new AddTrickType();
    //     return [new PreloadedExtension([$addTrickType], []),];
    // }

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
