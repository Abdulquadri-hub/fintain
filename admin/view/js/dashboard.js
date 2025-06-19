async function dashboardActive() {
    const userInfo = JSON.parse(sessionStorage.getItem('user'))
    document.querySelector('h1 p span').innerHTML = `${userInfo.firstname}&nbsp;${userInfo.lastname}`
}