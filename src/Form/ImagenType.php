<?php

namespace App\Form;

use App\Entity\Imagen;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ImagenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre', FileType::class, [
                'label' => 'Nombre imagen (JPG o PNG)',
                'label_attr' => ['class' => 'etiqueta'],
                'data_class' => null,
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Por favor, seleccione un archivo jpg o png',
                    ])
                ],
            ])
            ->add('descripcion', TextType::class, [
                'label' => 'Descripción:',
                'required' => false,
                'label_attr' => ['class' => 'etiqueta'],
            ])
            ->add('categoria', NumberType::class, [
                'label' => 'Categoría:',
                'label_attr' => ['class' => 'etiqueta'],
                'data' => 1,
            ])
            ->add('numVisualizaciones', NumberType::class, [
                'label' => 'Visualizaciones:',
                'label_attr' => ['class' => 'etiqueta'],
            ])
            ->add('numLikes', NumberType::class, [
                'label' => 'Likes:',
                'label_attr' => ['class' => 'etiqueta'],
            ])
            ->add('numDownloads', NumberType::class, [
                'label' => 'Descargas:',
                'label_attr' => ['class' => 'etiqueta'],
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Password:',
                'label_attr' => ['class' => 'etiqueta'],
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Imagen::class,
        ]);
    }
}
