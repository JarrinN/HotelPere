<?php
    namespace App\Controller;

    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use App\Entity\Usuario;
    use App\Form\Type\UserType;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\IntegerType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;
    use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Bridge\Doctrine\Form\Type\EntityType;
    use Symfony\Component\Form\Extension\Core\Type\HiddenType;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Security\Core\User\UserInterface;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

    class UsuarioController extends AbstractController {

        /**
        * @Route("registro", name="registro") 
        */
        public function registrar(Request $request,UserPasswordEncoderInterface $encoder)
        {
            $user = new Usuario();
            $formulario = $this->createFormBuilder($user)
                ->add('user',TextType::class, array('label' => 'Nombre de usuario'))
                ->add('email',EmailType::class, array('label' => 'Email'))
                ->add('pass',RepeatedType::class, array(
                    'type'=> PasswordType::class,
                    'first_options' => array('label' => 'Contraseña'),
                    'second_options' => array('label' => 'Repite la contraseña')
                ))
                ->add('rol',HiddenType::class, array(
                    'empty_data' => 'ROLE_USER'
                ))
                ->add('save',SubmitType::class,array('label'=>'Crear'))
                ->getForm();
            
            
            $formulario->handleRequest($request);

            if($formulario->isSubmitted() && $formulario->isValid()){
                $user = $formulario->getData();
                $password = $encoder->encodePassword($user, $user->getPass());
                $user->setPass($password);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                return $this->redirectToRoute('login');
            }
            
            return $this->render('registro.html.twig',array('formulario'=>$formulario->createView()));
        }

    }

?>