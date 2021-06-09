<?php

namespace App\Controller;

use App\Form\ContactType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * @Route("/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/", name="contact_sendMessage", methods={"GET","POST"})
     */
    public function sendMessage(Request $request, MailerInterface $mailer): Response
    {

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $contactData = $form->getData();

            $message = (new Email())
                ->from($contactData['email'])
                ->to('ton@gmail.com') // configurated for mailtrap in dev
                ->subject('bizikletak : nouveau message')
                ->text($contactData['message']);
            $mailer->send($message);

            $this->addFlash('success', 'Vore message a été envoyé');
            return $this->redirectToRoute('home');
        }
        return $this->render('contact/contact.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
