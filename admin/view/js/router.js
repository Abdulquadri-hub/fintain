/* 
    Object key is the id of the  menu selector
    template: is the html template name.
    startingFunction: function to call when page opens 

*/

const routerTree = {

    dashboard: {
        template: 'dashboard',
        startingFunction: 'dashboardActive',
        scriptName: './js/dashboard.js'
    },
    access_control: {
        template: 'accesscontrol',
        startingFunction: 'accesscontrolActive',
        scriptName: './js/accesscontrol.js'
    },
    profile: {
        template: 'profile',
        startingFunction: 'profileActive',
        scriptName: './js/profile.js'
    },
    password: {
        template: 'changepassword',
        startingFunction: 'changepasswordActive',
        scriptName: './js/changepassword.js'
    },
    'user/select': {
        template: 'selectuser',
        startingFunction: 'selectUserActive',
        scriptName: './js/selectuser.js'
    },
    'user/deactivate': {
        template: 'deactivateuser',
        startingFunction: 'deactivateUserActive',
        scriptName: './js/deactivateuser.js'
    },
    logo: {
        template: 'logo',
        startingFunction: 'logoRouteActive',
        scriptName: './js/logo.js'
    },
    individual: {
        template: 'individual',
        startingFunction: 'individualActive',
        scriptName: './js/individual.js'
    },
    company: {
        template: 'company',
        startingFunction: 'companyActive',
        scriptName: './js/company.js'
    },
}

const ext = '.php'

function routerEvent(route) {
    if(route) {
        let queryParams = `?r=${route}`
        window.history.pushState(queryParams, undefined, `${window.origin.concat(window.location.pathname, queryParams)}`)
        resolveUrlPage()
        if(!isDeviceMobile()) toggleNavigation()
    }
}


function resolveUrlPage() {
    let searchParams = new URLSearchParams(window.location.search)
    if(searchParams.has('r')) {
        let page = routerTree[searchParams.get('r').trim()].template
        openRoute(page+ext)
    }
    else {
        // open home default page
        let queryParams = `?r=dashboard`
        window.history.pushState(queryParams, undefined, `${window.origin.concat(window.location.pathname, queryParams)}`)
        openRoute('dashboard'+ext)
    }
    showActiveRoute()
}

function showActiveRoute() {

    let searchParams = new URLSearchParams(window.location.search)
    let page = searchParams.get('r')
    let menu = document.getElementById(page)
    document.querySelectorAll('#navigation .active').forEach( item => item.classList.remove('active'))
    document.querySelectorAll('#navigation .navitem-child-active').forEach( item => item.classList.remove('navitem-child-active'))
    if(menu?.classList.contains('navitem-child')) {
        menu.classList.add('navitem-child-active')
        menu.parentElement.previousElementSibling.classList.add('active')
    }
    else menu?.classList.add('active')
    
}


async function openRoute(url) {
    try {

        document.getElementById('workspace').innerHTML = `
            <div class="w-full h-full flex mt-20">
                <div class="loader m-auto"></div>
            </div>
        `
        document.getElementById('workspace').innerHTML = await httpRequest(url)
        intializePageJavascript()
    } catch (error) {
        console.log(error)
    }
}

let timer;

function intializePageJavascript() {
    let searchParams = new URLSearchParams(window.location.search)
    let startingFunction = routerTree[searchParams.get('r').trim()].startingFunction
    try {
        clearInterval(timer)
        timer = null;
        timer = setTimeout(() => window?.[startingFunction]?.(), 1000)
    }
    catch(e) {}
}

Object.freeze(routerTree)
