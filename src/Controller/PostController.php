<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/post", name="post.")
*/
class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(PostRepository $postRepository): Response
    {

        $posts = $postRepository->findall();

        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }
     /**
     * @Route("/create", name="create")
     * @param Request $request
     *  @return Response
     */
    public function create(Request $request){
        // create a new post
        $post = new Post();

        $form = $this->createForm(PostType::class,$post);

        $form ->handleRequest($request);
        $form->getErrors();

        if($form->isSubmitted()  && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            //dump($post);
            $em->persist($post);
            $em->flush();

            return $this->redirect($this->generateUrl('post.index'));

        }
        return $this->render('post/create.html.twig', ['form'=>$form->createView()]);
    }
        /**
         * @Route("/show/{id}", name="show")
         */
    public function show(Post $post){
        //Show Posts
        return $this->render('post/show.html.twig',['post'=>$post]);
    }

    /**
    * @Route("/delete/{id}", name="delete")
    * @param Request $request
    *  @return Response
    */
    public function remove(Post $post){
    //Function to delete Book
        $em= $this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();
        $this->addFlash('success','Succesfully Deleted');

    return $this->redirect($this->generateUrl('post.index'));

    }
}
