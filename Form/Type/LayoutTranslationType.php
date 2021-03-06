<?php

namespace Lexik\Bundle\MailerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\LanguageType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * @author Laurent Heurtault <l.heurtault@lexik.fr>
 */
class LayoutTranslationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('body', null, array(
            'attr'  => array('rows' => 20),
            'label' => 'lexik_mailer.translations.subject',
        ));

        if ($options['with_language']) {
            $builder->add('lang', LanguageType::class, array(
                'preferred_choices' => $options['preferred_languages'],
                'label'             => 'lexik_mailer.translations.subject',
            ));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'          => 'Lexik\Bundle\MailerBundle\Entity\LayoutTranslation',
            'with_language'       => true,
            'preferred_languages' => array('en', 'fr', 'es', 'de', 'it', 'pt', 'ja', 'zh'),
            'translation_domain'  => 'LexikMailerBundle',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'mailer_layout_translation';
    }
}
