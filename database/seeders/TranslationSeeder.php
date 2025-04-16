<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TranslationSeeder extends Seeder {
  /**
   * Run the database seeds.
   */
  public function run(): void {
    $translations = [
      'en' => [
        // Navigation
        'nav.home'                     => 'Home',
        'nav.about'                    => 'About us',
        'nav.destinations'             => 'Destinations',
        'nav.services'                 => 'Services',
        'nav.blog'                     => 'Blog',
        'nav.contact'                  => 'Contact us',
        'nav.consultation'             => 'Get Free Consultation!',
        'nav.language'                 => 'Language',
        'nav.links'                    => 'Useful Links',

        // Hero Section
        'hero.title.line1'             => 'Unlocking Global Horizons,',
        'hero.title.line2'             => 'The EpsEducation to Study',
        'hero.title.line3'             => 'Abroad',
        'hero.subtitle'                =>
        'Your trusted partner for international education opportunities',
        'hero.tagline.line1'           => 'YOUR FUTURE IS',
        'hero.tagline.line2'           => 'OUR PRIORITY™',
        'hero.cta'                     => 'Get Started Today',
        'hero.video.title'             => 'EpsEducation Introduction Video',
        'hero.video.desc'              => 'Learn more about our study abroad services',

        // Services
        'services.title'               => 'Our Services',
        'services.return'              => 'Return to Services',
        'services.subtitle'            =>
        'Services we are offering is specifically designed to meet your needs',
        'services.visa.title'          => 'Visa',
        'services.visa.desc'           =>
        'We help students complete paperwork for admission to universities and assist with visa applications.',
        'services.admissions.title'    => 'Admissions',
        'services.admissions.desc'     =>
        'We organize admission applications, assisting with forms and required documentation.',
        'services.scholarships.title'  => 'Scholarships',
        'services.scholarships.desc'   =>
        'We connect students with various scholarship options for international education.',
        'services.accommodation.title' => 'Accommodation',
        'services.accommodation.desc'  =>
        'We help find the perfect type of accommodation according to your preferences.',
        'services.cta'                 => 'Get Consultation For Free',
        //Destinations
        'destinations.title'           => 'Explore Our Destinations',
        'destinations.subtitle'        => 'Popular destinations for international students',
        'destinations.country'         => 'Country',
        'destinations.notFound'        => 'No destination found',
        'destinations.notFoundMessage' =>
        'No destination found. Please check back later or contact us for more information.',
        'destinations.backToList'      => 'View all destinations',
        'destinations.cta'             => 'View All Destinations',
        //blogs
        'blogs.return'                 => 'Return to Blogs',
        //FQA
        'fqa.title'                    => 'Frequently Asked Questions',
        //Cta
        'cta.title'                    => 'Ready to start your international education journey?',
        'cta.desc'                     =>
        'Contact us today for a free consultation and take the first step towards your future.',
        'cta.button'                   => 'Get Free Consultation',
        'destinations.cta'             => 'View All Destinations',
        //contact
        'contact.title'                => 'Contact Us',
        'contact.partner'              => 'Partner with us',
        'contact.partner.desc'         =>
        'We are always looking for new partners to help us provide the best services to our students.',
        // Lundi au Vendredi 9.00- 13.00 / 14=>00-18=>00
        // Samedi 9.00 - 13.00
        'contact.workingHours'         => 'Working Hours',
        'contact.workingDays'          => 'Monday to Friday=> 9.00- 13.00 / 14=>00-18=>00',
        'contact.weekend'              => 'Saturday=> 9.00 - 13.00',
        'contact.email'                => 'Email',
        'contact.phone'                => 'Phone',
        'contact.address'              => 'Address',
        'contact.social'               => 'Social Media',
        'contact.form.success'         => 'Form submitted successfully',
        'contact.form.error'           => 'An error occurred while submitting the form',
        'contact.form.et'              => 'and',
        'contact.form.name'            => 'Last Name',
        'contact.form.prenom'          => 'First Name',
        'contact.form.email'           => 'Email',
        'contact.form.phone'           => 'Phone',
        'contact.form.message'         => 'Message',
        'contact.form.city'            => 'City',
        'contact.form.agence'          => 'Agency',
        'contact.form.sexe'            => 'Sexe',
        'contact.form.send'            => 'Send',
        'contact.form.sending'         => 'Sending...',
        'contact.form.Claim'           => 'Claim Your Free Consultation!',
      ],
      'fr' => [
        // Navigation
        'nav.home'                     => 'Accueil',
        'nav.about'                    => 'À propos',
        'nav.services'                 => 'Services',
        'nav.destinations'             => 'Destinations',
        'nav.blog'                     => 'Blog',
        'nav.contact'                  => 'Contactez-nous',
        'nav.consultation'             => 'Consultation Gratuite !',
        'nav.language'                 => 'Langue',
        'nav.links'                    => 'Liens Utiles',

        // Hero Section
        'hero.title.line1'             => 'Ouvrez des Horizons Mondiaux,',
        'hero.title.line2'             => 'EpsEducation pour Étudier',
        'hero.title.line3'             => "à l'Étranger",
        'hero.subtitle'                =>
        "Votre partenaire de confiance pour les opportunités d'éducation internationale",
        'hero.tagline.line1'           => 'VOTRE AVENIR EST',
        'hero.tagline.line2'           => 'NOTRE PRIORITÉ™',
        'hero.cta'                     => "Commencez Aujourd'hui",
        'hero.video.title'             => 'Vidéo de Présentation EpsEducation',
        'hero.video.desc'              => "En savoir plus sur nos services d'études à l'étranger",

        // Services
        'services.title'               => 'Nos Services',
        'services.return'              => 'Retour aux Services',
        'services.return'              => 'Retour aux Services',
        'services.subtitle'            =>
        'Les services que nous proposons sont spécifiquement conçus pour répondre à vos besoins',
        'services.visa.title'          => 'Visa',
        'services.visa.desc'           =>
        "Nous aidons les étudiants à compléter les formalités d'admission aux universités et les assistons dans leurs demandes de visa.",
        'services.admissions.title'    => 'Admissions',
        'services.admissions.desc'     =>
        "Nous organisons les demandes d'admission, en aidant avec les formulaires et la documentation requise.",
        'services.scholarships.title'  => 'Bourses',
        'services.scholarships.desc'   =>
        "Nous mettons les étudiants en relation avec diverses options de bourses pour l'éducation internationale.",
        'services.accommodation.title' => 'Hébergement',
        'services.accommodation.desc'  =>
        "Nous vous aidons à trouver le type d'hébergement parfait selon vos préférences.",
        'services.cta'                 => 'Obtenir une Consultation Gratuite',
        //Destinations
        'destinations.title'           => 'Explorez Nos Destinations',
        'destinations.subtitle'        =>
        'Destinations populaires pour les étudiants internationaux',
        'destinations.cta'             => 'Voir Toutes les Destinations',
        'destinations.country'         => 'Pays',
        'destinations.notFound'        => 'Aucune destination trouvée',
        'destinations.notFoundMessage' =>
        "Aucune destination trouvée. Veuillez vérifier plus tard ou nous contacter pour plus d'informations.",
        'destinations.backToList'      => 'Voir toutes les destinations',
        //blogs
        'blogs.return'                 => 'Retour aux Blogs',
        //FQA
        'fqa.title'                    => 'Questions Fréquemment Posées',
        //Cta
        'cta.title'                    => 'Prêt à commencer votre parcours éducatif international ?',
        'cta.desc'                     =>
        "Contactez-nous dès aujourd'hui pour une consultation gratuite et faites le premier pas vers votre avenir.",
        'cta.button'                   => 'Obtenir une Consultation Gratuite',
        'fqa.return'                   => 'Retour aux Questions Fréquemment Posées',
        //contact
        'contact.title'                => 'Contactez-nous',
        'contact.partner'              => 'Devenez partenaire avec nous',
        'contact.partner.desc'         =>
        'Nous sommes toujours à la recherche de nouveaux partenaires pour nous aider à fournir les meilleurs services à nos étudiants.',
        // Lundi au Vendredi 9.00- 13.00 / 14=>00-18=>00
        // Samedi 9.00 - 13.00
        'contact.workingHours'         => 'Heures de travail',
        'contact.workingDays'          => 'de lundi au vendredi => 9.00- 13.00 / 14=>00-18=>00',
        'contact.weekend'              => 'semedi => 9.00 - 13.00',
        'contact.email'                => 'Email',
        'contact.phone'                => 'Téléphone',
        'contact.address'              => 'Adresse',
        'contact.social'               => 'Réseaux sociaux',
        'contact.form.success'         => 'Le formulaire a été envoyé avec succès',
        'contact.form.error'           =>
        "Une erreur est survenue lors de l'envoi du formulaire",
        'contact.form.et'              => 'et',
        'contact.form.name'            => 'Nom',
        'contact.form.prenom'          => 'Prénom',
        'contact.form.email'           => 'Email',
        'contact.form.phone'           => 'Téléphone',
        'contact.form.message'         => 'Message',
        'contact.form.city'            => 'Ville',
        'contact.form.agence'          => 'Agence',
        'contact.form.sexe'            => 'Sexe',
        'contact.form.Claim'           => 'Réclamer votre consultation gratuite !',
        'contact.form.send'            => 'Envoyer',
        'contact.form.sending'         => 'Envoi en cours...',
      ],
      'ar' => [
        // Navigation
        'nav.home'                     => 'الرئيسية',
        'nav.about'                    => 'من نحن',
        'nav.services'                 => 'الخدمات',
        'nav.destinations'             => 'الوجهات',
        'nav.blog'                     => 'المدونة',
        'nav.contact'                  => 'اتصل بنا',
        'nav.consultation'             => 'احصل على استشارة مجانية!',
        'nav.language'                 => 'اللغة',
        'nav.links'                    => 'روابط مفيدة',

        // Hero Section
        'hero.title.line1'             => 'فتح آفاق عالمية،',
        'hero.title.line2'             => 'وجهة للدراسة',
        'hero.title.line3'             => 'في الخارج',
        'hero.subtitle'                => 'شريكك الموثوق لفرص التعليم الدولية',
        'hero.tagline.line1'           => 'مستقبلك هو',
        'hero.tagline.line2'           => 'أولويتنا™',
        'hero.cta'                     => 'ابدأ اليوم',
        'hero.video.title'             => 'فيديو تعريفي عن وجهة',
        'hero.video.desc'              => 'تعرف على المزيد حول خدمات الدراسة في الخارج',

        // Services
        'services.title'               => 'خدماتنا',
        'services.return'              => 'العودة إلى الخدمات',
        'services.subtitle'            => 'الخدمات التي نقدمها مصممة خصيصًا لتلبية احتياجاتك',
        'services.visa.title'          => 'التأشيرة',
        'services.visa.desc'           =>
        'نساعد الطلاب في استكمال الأوراق للقبول في الجامعات والمساعدة في طلبات التأشيرة.',
        'services.admissions.title'    => 'القبول',
        'services.admissions.desc'     =>
        'ننظم طلبات القبول، ونساعد في النماذج والوثائق المطلوبة.',
        'services.scholarships.title'  => 'المنح الدراسية',
        'services.scholarships.desc'   =>
        'نربط الطلاب بخيارات مختلفة من المنح الدراسية للتعليم الدولي.',
        'services.accommodation.title' => 'السكن',
        'services.accommodation.desc'  =>
        'نساعدك في العثور على نوع السكن المثالي وفقًا لتفضيلاتك.',
        'services.cta'                 => 'احصل على استشارة مجانية',
        //Destinations
        'destinations.title'           => 'استكشف وجهاتنا',
        'destinations.subtitle'        => 'وجهات شهيرة للطلاب الدوليين',
        'destinations.cta'             => 'عرض جميع الوجهات',
        'destinations.country'         => 'بلد',
        'destinations.notFound'        => 'لا توجد وجهات',
        'destinations.notFoundMessage' =>
        'لا توجد وجهات متاحة حاليًا. يرجى التحقق لاحقًا أو الاتصال بنا لمزيد من المعلومات.',
        'destinations.backToList'      => 'عرض جميع الوجهات',
        //blogs
        'blogs.return'                 => 'العودة إلى المدونات',
        //FQA
        'fqa.title'                    => 'الأسئلة الشائعة',
        'fqa.return'                   => 'العودة إلى الأسئلة الشائعة',
        //Cta
        'cta.title'                    => 'هل أنت مستعد لبدء رحلتك التعليمية الدولية؟',
        'cta.desc'                     =>
        'اتصل بنا اليوم للحصول على استشارة مجانية واتخذ الخطوة الأولى نحو مستقبلك.',
        'cta.button'                   => 'احصل على استشارة مجانية',
        //contact
        'contact.title'                => 'اتصل بنا',
        'contact.partner'              => 'كن شريكًا لنا',
        'contact.partner.desc'         =>
        'نحن دائمًا نبحث عن شركاء جدد لمساعدتنا في تقديم أفضل الخدمات لطلابنا.',
        // Lundi au Vendredi 9.00- 13.00 / 14=>00-18=>00
        // Samedi 9.00 - 13.00
        'contact.workingHours'         => 'ساعات العمل',
        'contact.workingDays'          => 'من الاثنين إلى الجمعة=> 9.00- 13.00 / 14=>00-18=>00',
        'contact.weekend'              => 'السبت=> 9.00 - 13.00',
        'contact.email'                => 'البريد الإلكتروني',
        'contact.phone'                => 'الهاتف',
        'contact.address'              => 'العنوان',
        'contact.social'               => 'وسائل التواصل الاجتماعي',
        'contact.form.success'         => 'تم إرسال النموذج بنجاح',
        'contact.form.error'           => 'حدث خطأ أثناء إرسال النموذج',
        'contact.form.et'              => 'و',
        'contact.form.name'            => 'الاسم',
        'contact.form.prenom'          => 'الاسم الأول',
        'contact.form.email'           => 'البريد الإلكتروني',
        'contact.form.phone'           => 'الهاتف',
        'contact.form.message'         => 'الرسالة',
        'contact.form.city'            => 'المدينة',
        'contact.form.agence'          => 'الوكالة',
        'contact.form.sexe'            => 'الجنس',
        'contact.form.Claim'           => 'احصل على استشارتك المجانية!',
        'contact.form.send'            => 'إرسال',
        'contact.form.sending'         => 'جاري الإرسال...',
      ],
    ];

    $data = [];

    foreach ($translations as $locale => $entries) {
      foreach ($entries as $key => $value) {
        $data[] = [
          'language'   => $locale,
          'key'        => $key,
          'value'      => $value,
          'created_at' => now(),
          'updated_at' => now(),
        ];
      }
    }

    DB::table('translations')->insert($data);
  }
}
