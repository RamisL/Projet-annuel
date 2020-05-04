var dateReload = document.querySelectorAll("[data-reload]")
var h1 = document.getElementById('h1')
var language = {
    eng: {
        welcome: "welcome pute"
    },
    fr: {
        welcome: "bonjour pute"
    },
    es: {
        welcome: "holla putas"
    }
};

if (window.location.hash) {
    if(window.location.hash === "#eng"){
        h1.textContent = language.eng.welcome 
    }
}
if (window.location.hash) {
    if(window.location.hash === "#fr"){
        h1.textContent = language.fr.welcome 
    }
}
if (window.location.hash) {
    if(window.location.hash === "#es"){
        h1.textContent = language.es.welcome 
    }
}
/*
var Language = {
    'en': {
        'intro': 'lucas is a puta'
    },
    'fr': {
        'intro': 'Nous vous faisons bénéficier de nos services pour permettre de rendre votre vie plus calme et ordonné grâce à un service d’aide à domicile de qualité. Soucieux de satisfaire nos clients, nous mettons tous en oeuvre pour répondre à leurs attentes.Quelle que soit la prestation, nous mettons à votre disposition nous mettons à votre services nos meilleurs effectifs qualifiés dans tout les domaines dans lequels nous intervenons comme aide à la personne, nettoyage à la perfection de votre comme si vous veniez de l\'acheter et bien plus encore, rien n\'arrete votre imagination. Nous intervenons partout en france 7j/7, 24h/24.'
    },
    'es': {
        'intro': 'me gusta la paela'
    }

};

$(function () {
    $('.translate').click(function () {
        var lang = $(this).attr('id');

        $('.lang').each(function (index, element) {
            $(this).text(arrLang[lang][$(this).attr('key')]);
        });
    });
});

*/
