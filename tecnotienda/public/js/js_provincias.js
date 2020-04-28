
function visualizarCanton() {

    var cantones_1 = new Array
            ("1 Cantón de San José ", "2 Cantón de Acosta ", "3 Cantón de Alajuelita", "4 Cantón de Aserrí", "5 Cantón de Curridabat", "6 Cantón de Desamparados6", "7 Cantón de Dota ", "8 Cantón de Escazú ", "9 Cantón de Goicochea", "10 Canton de León Cortes"
                    , "11 Cantón de Montes de Oca", "12 Cantón de Mora", "13 Cantón de Moravia", "14 Cantón de Pérez Zeledón", "15 Canton de Purisca", "16 Cantón de Santa Ana ", "17 Cantón de Tarrazú", "18 Cantón de Tibás", "19 Cantón de Turrubares"
                    , "20 Canton de Vázques de Coronado");

    var cantones_2 = new Array("1 Cantón de Alajuela", "2 Cantón de Atenas", "3 Cantón de Grecia", "4 Cantón de Guatuso", "5 Cantón de los Chiles",
            "6 Cantón de Naranjo", "7 Cantón de Orotina", "8 Cantón de Palmares", "9 Cantón de Poás", "10 Canton de Río Cuarto", "11 Cantón de San Carlos ", "12 Cantón de San Mateo",
            "13 Cantón de San Ramón", "14 Cantón de Upala", "15 Cantón de Valverde Vega", "16 Cantón de Zarcero");

    var cantones_3 = new Array("1 Cantón de Cartago", "2 Cantón de Alvarado", "3 Cantón de El Guarco", "4 Cantón de Jimenéz", "5 Canton de La Unión", "6 Cantón de Oreamuno",
            "7 Cantón de Paraiso", "8 Cantón de Turrialba");

    var cantones_4 = new Array("1 Cantón de Heredia", "2 Cantón de Barva", "3 Cantón de Belén", "4 Cantón de Flores", "5 Canton de San Isidro", "6 Cantón de San Pablo", "7 Cantón de San Rafael", "8 Cantón de Santa Bárbara", "9 Cantón de Santo Domingo", "10 Cantón de Sarapiquí");

    var cantones_5 = new Array("1 Cantón de Liberia", "2 Cantón de Abangares", "3 Cantón de Bagaces", "4 Cantón de Cañas", "5 Canton de los Carrillo ", "6 Cantón de Hojancha ",
            "7 Cantón de la Cruz", "8 Cantón de Nandayure", "9 Cantón de Nicoya", "10 Cantón de Santa Cruz ", "11 Cantón de Tilarán ");

    var cantones_6 = new Array("1 Cantón de Puntarenas", "2 Cantón de Buenos Aires", "3 Cantón de Corredores", "4 Cantón de Coro Brus", "5 Canton de Esparza",
            "6 Cantón de Garabito", "7 Cantón de  Golfito ", "8 Cantón de  Montes de Oro", "9 Cantón de Osa", "10 Cantón de Parrita", "11 Canton de Quepo");

    var cantones_7 = new Array("1 Canton de Limón ", "2 Cantón de Guácimo", "3 Cantón de Matina", "4 Cantón de Pococí", "5 Canton de Siquirres", "6 Cantón de Talamanca");

    var cosa = document.formulario1.provincia[document.formulario1.provincia.selectedIndex].value;
    
    //se chequea si la "cosa" esta definida

    if (cosa != 0) {
        //alert("cosa :" + cosa);
        //selecionamos las cosas Correctas
        mis_opts = eval("cantones_" + cosa);
        //se calcula el numero de cosas
        //  alert(mis_opts);
        num_opts = mis_opts.length;
        // alert(num_opts);
        //marco el numero de opt en el select
        document.formulario1.canton.length = num_opts;
        //para cada opt del array, la pongo en el select
        for (i = 0; i < num_opts; i++) {
            // alert("aa");
            document.formulario1.canton.options[i].value = mis_opts[i];
            document.formulario1.canton.options[i].text = mis_opts[i];
            //   alert("coo" + document.formulario1.canton.options[i].value);
        }
    } else {
        //si no habia ninguna opt seleccionada, elimino las cosas del select
        document.formulario1.canton.length = 1;
        //ponemos un guion en la unica opt que he dejado
        document.formulario1.canton.options[0].value = "-";
        document.formulario1.canton.options[0].text = "-";
    }
    //hacer un reset de las opts
    document.formulario1.canton.options[0].selected = true;
}


function visualizarDistritoSanJose() {
    //distritos de san jose
    var distritossj1 = new Array("Carmen", "Catedral", "Hatillo", "Hospital", "La Uruca", "Mata ", "Redonda", "Merced", "Pavas", "San Francisco de Dos Ríos", "San Sebastián", "Zapote");
    var distritossj2 = new Array("Cangrejal", "Guaitil", "Palmichal", "Sabanillas", "San Ignacio");//Acosta
    var distritossj3 = new Array("Alajuelita", " Concepción,", "San Antonio", "San Felipe", "San Josecito");//Alajuelita
    var distritossj4 = new Array("Aserrí", "Legua", "Monterrey", "Salitrillos", " San Gabriel", "Tarbaca", "Vuelta de Jorco");//Aserri
    var distritossj5 = new Array("Curridabat", "Granadilla", "Sánchez", "Tirrases");//La curridabat
    var distritossj6 = new Array("Damas", "Desamparados", "Frailes", "Gravilias", "Los Guido", "Patarrá", "Rosario", "San Antonio", "San Cristóbal", "San Juan de Dios", "San Miguel", " San Rafael Abajo", "San Rafael Arriba");//desamparados
    var distritossj7 = new Array("Copey", "Jardín", "Santa María"); //dota
    var distritossj8 = new Array("Escazú", "San Antonio", "San Rafael)");//escazu
    var distritossj9 = new Array("Calle Blancos Ballena", "Guadalupe", "Ipís", "Mata de Plátano", "Purral", "Rancho Redondo", "San Francisco");//goicochea
    var distritossj10 = new Array("San Pablo", "San Andrés", " Llano Bonito", "San Isidro", "Santa Cruz", " San Antonio"); //leon cortes
    var distritossj11 = new Array("Mercedes", "Sabanilla", "San Pedro", "San Rafael");//montes de oca
    var distritossj12 = new Array("Ciudad Colón", "Guayabo", "Jaris", "Picagres", "Piedras Negras", "Tabarcia");// mora
    var distritossj13 = new Array("San Jerónimo", "San Vicente", "Trinidad");//Moravia
    var distritossj14 = new Array(" San Isidro de El General", "Barú", "Cajón", "Daniel Flores", " El General", "La Amistad", "Páramo", "Pejibaye", "Platanares", "Río Nuevo", "Rivas", "San Pedro");//Perez zeledon
    var distritossj15 = new Array("Barbacoas", "Candelarita", "Chires", "Desamparaditos", " Grifo Alto", "Mercedes Sur", "San Antonio", " San Rafael", "Santiago");//Puriscal
    var distritossj16 = new Array("Brasil", "Piedades", "Pozos", "Salitral", " Santa Ana", "Uruca");//Santa Ana
    var distritossj17 = new Array("San Carlos", " San Lorenzo", "San Marcos"); //Tarrazu
    var distritossj18 = new Array("Anselmo Llorente", "Cinco Esquinas", "Colima", "León XIII", "San Juan");//Tibas
    var distritossj19 = new Array("Carara", "San Juan de Mata", " San Luis", " San Pablo", "San Pedro");//Turribares
    var distritossj20 = new Array("Cascajal", "Dulce Nombre de Jesús", "Patalillo", "San Isidro", "San Rafael"); //vazquez de coronado

    var cosa = document.formulario1.canton[document.formulario1.canton.selectedIndex].value;

    var identificador = cosa.substring(0, 1);

    mis_opts = eval("distritossj" + identificador);

    num_opts = mis_opts.length;
    //alert(num_opts);
    //marco el numero de opt en el select
    document.formulario1.distrito.length = num_opts;
    //para cada opt del array, la pongo en el select
    for (i = 0; i < num_opts; i++) {
        // alert("aa");
        document.formulario1.distrito.options[i].value = mis_opts[i];
        document.formulario1.distrito.options[i].text = mis_opts[i];
        //   alert("coo" + document.formulario1.canton.options[i].value);
    }
    //hacer un reset de las opts
    document.formulario1.distrito.options[0].selected = true;



}
function visualizarDistritoAlajuela() {
    //Distritos de Alajuela

    var distritosA1 = new Array("Alajuela", "Carrizal", "Desamparados", "Garita", "Guácima", "Río Segundo", "Sabanilla", "San Antonio", "San Isidro", " San José", " San Rafael", " Sarapiquí", "Tambor", "Turrúcares");//Canton de Alajuela
    var distritosA2 = new Array("Atenas", "Concepción", "Escobal", "Jesús", "Mercedes", "San Isidro", " San José", "Santa Eulalia"); //Atenas
    var distritosA3 = new Array("Bolívar", "Grecia", " Puente de Piedra", "San Isidro", "San José", "San Roque", "Tacares");//Grecia
    var distritosA4 = new Array("Buenavista", "Cote", "Katira", "San Rafael");//Guatuzo
    var distritosA5 = new Array("Caño Negro", "El Amparo", "Los Chiles", "San Jorge");//Chiles
    var distritosA6 = new Array("Cirri Sur", "El Rosario", " Naranjo", "Palmitos", " San Jerónimo", "San José", " San Juan", " San Miguel");//Naranjo
    var distritosA7 = new Array("Coyolar", "Hacienda Vieja", "La Ceiba", "Mastate", "Orotina");//Orotina
    var distritosA8 = new Array("Buenos Aires", "Candelaria", "Esquipulas", " La Granja", "Palmares", "Santiago", "Zaragoza");//Palmares
    var distritosA9 = new Array("Carrillos", " Sabana Redonda", " San Juan", "San Pedro", "San Rafael");//Poas
    var distritosA10 = new Array("Río Cuarto");//Río Cuarto
    var distritosA11 = new Array("Aguas Zarcas", "Buenavista", "Cutris", "Florencia", "La Fortuna", "La Palmera", "La Tigra", "Monterrey", "Pital", "Pocosol", "Quesada", "Venado", "Venecia");//San Carlos
    var distritosA12 = new Array("San Mateo", "Desmonte", " Jesús María");//San Mateo
    var distritosA13 = new Array("Alfaro", "Ángeles", "Concepción", " Peñas Blancas", " Piedades Norte", " Piedades Sur", " San Isidro", " San Juan", " San Rafael", " San Ramón", "Santiago", "Volio", "Zapotal"); //San Mateo
    var distritosA14 = new Array("Aguas", "Claras", "Bijagua", "Delicias", "Dos Ríos", "San José", "Upala", "Yolillal");//San Ramon
    var distritosA15 = new Array("Rodríguez", "San Pedro", "Sarchí Norte", "Sarchí Sur", "Toro Amarillo");//Valverde Vega
    var distritosA16 = new Array("Brisas", "Guadalupe", "Laguna", "Palmira", "Tapezco", "Zapote", "Zarcero");//Zarcero

    var cosa = document.formulario1.canton[document.formulario1.canton.selectedIndex].value;

    var identificador = cosa.substring(0, 1);

    mis_opts = eval("distritosA" + identificador);

    num_opts = mis_opts.length;
    //alert(num_opts);
    //marco el numero de opt en el select
    document.formulario1.distrito.length = num_opts;
    //para cada opt del array, la pongo en el select
    for (i = 0; i < num_opts; i++) {
        // alert("aa");
        document.formulario1.distrito.options[i].value = mis_opts[i];
        document.formulario1.distrito.options[i].text = mis_opts[i];
        //   alert("coo" + document.formulario1.canton.options[i].value);
    }
    //hacer un reset de las opts
    document.formulario1.distrito.options[0].selected = true;


}
function visualizarDistritoCartago() {
    //cartago
    var distritosc1 = new Array("Agua Caliente", "Carmen", "Corralillo", "Dulce Nombre", "Guadalupe", "Llano grande", "Occidental", "Oriental", "Quebradilla", "San Nicolás", "Tierra Blanca");
    var distritosc2 = new Array("Capellades", "Cervantes", "Pacayas");//alvarado
    var distritosc3 = new Array("Patio de Agua", "San Isidro", "Tejar", "Tobosi");//El guarco
    var distritosc4 = new Array("Juan Viñas", "Pejibaye", "Tucurrique");//Jimenez
    var distritosc5 = new Array("Concepción", "Dulce Nombre", "Río Azul", "San Diego", "San Juan", "San Rafael", "San Ramón", "Tres Ríos");//La union
    var distritosc6 = new Array("Cipreses", "Cot", "Potrero Cerrado", "San Rafael", "Santa Rosa");//Oreamuno
    var distritosc7 = new Array("Cachí", "Llanos de Santa Lucía", "Orosí", "Paraíso", "Santiago de Paraíso"); //Paraiso
    var distritosc8 = new Array("Chirripó", "La Isabel", "La Suiza", "Peralta", "Santa Cruz", "Santa Teresita", "Tayutic", "Tres Equis", "Tuis", "Turrialba");//Turrialba

    var cosa = document.formulario1.canton[document.formulario1.canton.selectedIndex].value;

    var identificador = cosa.substring(0, 1);

    mis_opts = eval("distritosc" + identificador);

    num_opts = mis_opts.length;
    //alert(num_opts);
    //marco el numero de opt en el select
    document.formulario1.distrito.length = num_opts;
    //para cada opt del array, la pongo en el select
    for (i = 0; i < num_opts; i++) {
        // alert("aa");
        document.formulario1.distrito.options[i].value = mis_opts[i];
        document.formulario1.distrito.options[i].text = mis_opts[i];
        //   alert("coo" + document.formulario1.canton.options[i].value);
    }
    //hacer un reset de las opts
    document.formulario1.distrito.options[0].selected = true;


}
function visualizarDistritoHeredia() {
    var distritosH1 = new Array("Heredia", "Mercedes", "San Francisco", "Ulloa", "Varablanca");//Canton de hEREDIA
    var distritosH2 = new Array("Barva", " San José de la Montaña", " San Pablo", " San Pedro", " San Roque", " Santa Lucía");//BARVA
    var distritosH3 = new Array("La Asunción, La Ribera", "San Antonio");//BELEN
    var distritosH4 = new Array("Barrantes", "Llorente", "San Joaquín");//FLORES
    var distritosH5 = new Array("Concepción", "San Francisco", " San Isidro", "San José");//SAN ISIDRO
    var distritosH6 = new Array("Rincón de Sabanilla", " San Pablo");//San Pablo
    var distritosH7 = new Array("Ángeles", "Concepción", "San Josecito", " San Rafael", "Santiago");//San Rafael
    var distritosH8 = new Array("Jesús", "Purabá", "San Juan", " San Pedro", " Santa Bárbara", " Santo Domingo"); //Santa Barbara
    var distritosH9 = new Array("Pará", "Paracito", "San Miguel", " San Vicente", " Santa Rosa", " Santo Domingo", "Santo Tomás", "Tures");//Santo Domingo
    var distritosH10 = new Array("Cureña", " La Virgen", " Las Horquetas", " Llanuras del Gaspar", " Puerto Viejo");//Sarapiqui

    var cosa = document.formulario1.canton[document.formulario1.canton.selectedIndex].value;

    var identificador = cosa.substring(0, 1);

    mis_opts = eval("distritosH" + identificador);

    num_opts = mis_opts.length;
    //alert(num_opts);
    //marco el numero de opt en el select
    document.formulario1.distrito.length = num_opts;
    //para cada opt del array, la pongo en el select
    for (i = 0; i < num_opts; i++) {
        // alert("aa");
        document.formulario1.distrito.options[i].value = mis_opts[i];
        document.formulario1.distrito.options[i].text = mis_opts[i];
        //   alert("coo" + document.formulario1.canton.options[i].value);
    }
    //hacer un reset de las opts
    document.formulario1.distrito.options[0].selected = true;


}
function visualizarDistritoGuanacaste() {
    //Distritos de Guanacaste 
    var distritosg1 = new Array("Cañas Dulces", "Curubandé", "Liberia", "Mayorga", "Nacascolo");//liberia
    var distritosg2 = new Array("Colorado", "Las Juntas", "San Juan", "Sierra");//abangares
    var distritosg3 = new Array("Bagaces", "La Fortuna", "Mogote", " Río Naranjo");//bagaces
    var distritosg4 = new Array("Bebedero", "Cañas", "Palmira", "Porozal", " San Miguel");//Cañas
    var distritosg5 = new Array("Belén", "Filadelfia", "Palmira", "Sardinal");//Carrillo
    var distritosg6 = new Array("Hojancha", "Huacas", "Monte Romo", "Puerto Carrillo");//Hojancha
    var distritosg7 = new Array("La Cruz", "La Garita", " Santa Cecilia", "Santa Elena");//La Cruz
    var distritosg8 = new Array("Bejuco", "Carmona", "Porvenir", "San Pablo", "Santa Rita", "Zapotal");//Nandayure
    var distritosg9 = new Array(" Belén de Nosarita", "Mansión", "Nosara", "Quebrada Honda", "Sámara", "San Antonio");//SNicoya
    var distritosg10 = new Array("Bolsón", "Cabo Velas", "Cartagena", "Diriá", "Santa Cruz", "Tamarindo", "Tempate", "Veintisiete de Abril");//Santa Cruz
    var distritosg11 = new Array("Arenal", "Líbano", "Quebrada Grande", "Santa Rosa", "Tierras Morenas", "Tilarán", "Tronadora");//Tilaran

    var cosa = document.formulario1.canton[document.formulario1.canton.selectedIndex].value;

    var identificador = cosa.substring(0, 1);

    mis_opts = eval("distritosg" + identificador);

    num_opts = mis_opts.length;
    //alert(num_opts);
    //marco el numero de opt en el select
    document.formulario1.distrito.length = num_opts;
    //para cada opt del array, la pongo en el select
    for (i = 0; i < num_opts; i++) {
        // alert("aa");
        document.formulario1.distrito.options[i].value = mis_opts[i];
        document.formulario1.distrito.options[i].text = mis_opts[i];
        //   alert("coo" + document.formulario1.canton.options[i].value);
    }
    //hacer un reset de las opts
    document.formulario1.distrito.options[0].selected = true;


}
function visualizarDistritoPuntarenas() {

    //distritos de puntarenas
    var distritosp1 = new Array("Acapulco", "Arancibia", "Barranca", "Chacarita", "Chira", "Chomes", "Cóbano", "El Roble", "Guacimal", "Isla del Coco", "Lepanto", "Manzanillo", "Monteverde", "Paquera", "Pitahaya", "Puntarenas");
    var distritosp2 = new Array("Biolley", "Boruca", "Brunka", "Buenos Aires", "Chánguena", "Colinas", "Pilas", "Potrero Grande", "Volcán");//buenos auires
    var distritosp3 = new Array("Corredor", " La Cuesta,", "Laurel", "Tobosi", "Paso Canoas", "Ciudad Neily");//El corredores
    var distritosp4 = new Array("Aguabuena", "Limoncito", "Pittier", "Sabalito", " San Vito", "Gutiérrez", "Brown");//coto brus
    var distritosp5 = new Array("Espíritu Santo", "Macacona", "San Jerónimo", "San Juan Grande", "San Rafael");//La esperanza
    var distritosp6 = new Array("Jacó", "Tárcoles");//Garabito
    var distritosp7 = new Array("Golfito", "Guayará", "Pavón", "Puerto Jiménez"); //golfito
    var distritosp8 = new Array("La Unión", "Miramar", "San Isidro");//Montes de oro
    var distritosp9 = new Array("Bahía Ballena", "Palmar", "Piedras Blancas", "Puerto Cortés", "Sierpe");//osa
    var distritosp10 = new Array("Parrita"); //parrita
    var distritosp11 = new Array("Quepos", "Naranjito", "Savegre");//quepos    

    var cosa = document.formulario1.canton[document.formulario1.canton.selectedIndex].value;

    var identificador = cosa.substring(0, 1);

    mis_opts = eval("distritosp" + identificador);

    num_opts = mis_opts.length;
    //alert(num_opts);
    //marco el numero de opt en el select
    document.formulario1.distrito.length = num_opts;
    //para cada opt del array, la pongo en el select
    for (i = 0; i < num_opts; i++) {
        // alert("aa");
        document.formulario1.distrito.options[i].value = mis_opts[i];
        document.formulario1.distrito.options[i].text = mis_opts[i];
        //   alert("coo" + document.formulario1.canton.options[i].value);
    }
    //hacer un reset de las opts
    document.formulario1.distrito.options[0].selected = true;



}
function visualizarDistritoLimon() {
    //Distritos de Limon

    var distritoslimon1 = new Array("Limón", "Matama", "Río Blanco", "Valle La Estrella");//Limon
    var distritosslimon2 = new Array("Duacarí", "Guácimo", "Mercedes", "Pocora", "Río Jiménez");//Guacimo
    var distritoslimon3 = new Array("Batán", "Carrandi", "Matina");//matina
    var distritoslimon4 = new Array("Cariari", "Colorado", "Guápiles", "Jiménez", "Rita", "Roxana");//Pococi
    var distritoslimon5 = new Array("Alegría", "Cairo", "Florida", "Germania", "Pacuarito", "Siquirres");//Siquirres
    var distritoslimon6 = new Array("Bratsi", "Cahuita", "Sixaola", "Telire");//talamanca

    var cosa = document.formulario1.canton[document.formulario1.canton.selectedIndex].value;

    var identificador = cosa.substring(0, 1);

    mis_opts = eval("distritoslimon" + identificador);

    num_opts = mis_opts.length;
    //alert(num_opts);
    //marco el numero de opt en el select
    document.formulario1.distrito.length = num_opts;
    //para cada opt del array, la pongo en el select
    for (i = 0; i < num_opts; i++) {
        // alert("aa");
        document.formulario1.distrito.options[i].value = mis_opts[i];
        document.formulario1.distrito.options[i].text = mis_opts[i];
        //   alert("coo" + document.formulario1.canton.options[i].value);
    }
    //hacer un reset de las opts
    document.formulario1.distrito.options[0].selected = true;


}

function visualizarDistrito() {

    if ((document.formulario1.provincia[document.formulario1.provincia.selectedIndex].text == "Limón")) {

        visualizarDistritoLimon();

    }



    if ((document.formulario1.provincia[document.formulario1.provincia.selectedIndex].text == "Puntarenas")) {

        visualizarDistritoPuntarenas();

    }


    if ((document.formulario1.provincia[document.formulario1.provincia.selectedIndex].text == "Guanacaste")) {

        visualizarDistritoGuanacaste();

    }


    if ((document.formulario1.provincia[document.formulario1.provincia.selectedIndex].text == "Heredia")) {

        visualizarDistritoHeredia();

    }


    if ((document.formulario1.provincia[document.formulario1.provincia.selectedIndex].text == "Cartago")) {

        visualizarDistritoCartago();

    }


    if ((document.formulario1.provincia[document.formulario1.provincia.selectedIndex].text == "Alajuela")) {

        visualizarDistritoAlajuela();

    }


    if ((document.formulario1.provincia[document.formulario1.provincia.selectedIndex].text == "San José")) {

        visualizarDistritoSanJose();

    }

}
