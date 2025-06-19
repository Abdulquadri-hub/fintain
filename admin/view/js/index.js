window.onload = function() {
    resolveUrlPage() 
    checkAccountForVerification()
    window.addEventListener('popstate', resolveUrlPage);

    const toggler = document.getElementById('toggler')
    if(toggler) toggler.addEventListener('click', toggleNavigation)

    if(!isDeviceMobile()) {
        const navigation =  document.getElementById('navigation')
        navigation.classList.add('show')
    }

    Array.from(document.querySelectorAll('#navigation .nav-item > span')).forEach( nav => {
        nav.addEventListener('click', () => {
            if(nav.nextElementSibling?.tagName.toLocaleLowerCase() == 'ul') {
                if(nav.parentElement.classList.contains('expand')) {
                    nav.parentElement.style.maxHeight = '36px';
                    nav.parentElement.classList.remove('expand')
                    nav.querySelectorAll('.material-symbols-outlined')[1].style.transform = 'rotate(0deg)'
                }
                else {
                    nav.parentElement.style.maxHeight = '500px';
                    nav.parentElement.classList.add('expand')
                    nav.querySelectorAll('.material-symbols-outlined')[1].style.transform = 'rotate(90deg)'
                }
            }
        })
    })

    Object.keys(routerTree).forEach( route => {
        if(route && !!document.getElementById(route)) {
            document.getElementById(route)?.addEventListener('click', () => {
                routerEvent(route)
                showActiveRoute()
            })
        }
    })

    const scriptsResource = Object.keys(routerTree).map( route => {
        return { url: routerTree[route].scriptName, controller: routerTree[route].startingFunction}
    })

    scriptsResource.filter( item => item.url !== '').forEach( resource => {
        loadScript(resource)
    })
    

}

function runoptioner(element){
    let name = element.getAttribute('name')
    console.log(element, name)
    for(let i=0;i<document.getElementsByClassName('optioner').length;i++){
            document.getElementsByClassName('optioner')[i].classList.remove('!text-blue-600', 'active')
        if(document.getElementsByClassName('optioner')[i].getAttribute('name') == name){
            document.getElementsByClassName('optioner')[i].classList.add('!text-blue-600', 'active')
            document.getElementById(`${name}`).classList.remove('hidden')
        }else{
            document.getElementsByClassName('optioner')[i].classList.remove('!text-blue-600', 'active')
            document.getElementById(`${document.getElementsByClassName('optioner')[i].getAttribute('name')}`).classList.add('hidden')
        }
    }
}

function checkAccountForVerification() {
    let user = JSON.parse(sessionStorage.getItem('user'))
    if(user?.status === 'NOT VERIFIED') {
        let div = document.createElement('div')
        div.className = 'bg-rose-400 text-white/90 text-xs p-1.5 px-5 flex items-center gap-3 font-heebo animate__animated animate__fadeInDown'
        div.innerHTML = `<span>Your account is not verified.</span><button class="underline underline-offset-4 hover:no-underline">Click to verify</button>`
        
        let domElement = document.querySelector('main')
        domElement.firstElementChild.insertBefore(div, domElement.firstElementChild.firstElementChild)
    }
}

function toggleNavigation() {
    const navigation =  document.getElementById('navigation')
    if(navigation){
        if(navigation.classList.contains('show')) {
            navigation.style.width = isDeviceMobile() ? '250px' : (80/100 * screen.availWidth ) + 'px'
            navigation.classList.remove('show')
        }
        else {
            navigation.style.width = '0'
            navigation.classList.add('show')
        }
    }
}

function isDeviceMobile() {
    let matches = window.matchMedia('(min-width: 1280px)').matches
    return matches
}
