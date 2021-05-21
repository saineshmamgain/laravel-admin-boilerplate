/* Boilerplate */

function setupAdminLTE()
{
    let public_path = 'public/admin-lte';
    let scripts_path = public_path + '/js';
    let images_path = public_path + '/img';
    let scripts = [];
    let images = [];

    const adminlte_imports = {
        "scripts" : [
            'node_modules/admin-lte/plugins/jquery/jquery.min.js',
            'node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js',
            'node_modules/admin-lte/dist/js/adminlte.min.js'
        ],
        "images" : [
            "node_modules/admin-lte/dist/img/*"
        ]
    };

    Object.keys(adminlte_imports).forEach(function(type){
        if (type === "scripts"){
            scripts.push(...adminlte_imports[type]);
        }
        if (type === "images"){
            images.push(...adminlte_imports[type])
        }
    })

    if (images.length > 0){
        copy(images, images_path);
    }
    if (scripts.length > 0){
        mix.scripts(scripts, scripts_path + '/app.js');
    }

    mix.sass('resources/css/admin-lte/app.scss', 'public/admin-lte/css/');
}

function copy(elements, path){
    elements.forEach(function(element){
        let parts = element.split('/');
        if (parts.pop() === "*"){
            mix.copyDirectory(parts.join('/'), path);
        }else{
            mix.copy(element , path);
        }
    })
}

setupAdminLTE();
