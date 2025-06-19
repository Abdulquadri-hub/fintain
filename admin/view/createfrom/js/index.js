async function getAllSegments(id='segment'){
    const request = await httpRequest2(baseurl+'/segment/fetch', null, null, 'json', 'GET');
    if(request.status) {
        if(request.data.length && id) {
            document.getElementById(id).innerHTML = `<option value="">--SELECT SEGMENT--</option>`;
            document.getElementById(id).innerHTML += request.data.map(item => `<option value="${item.id}">${item.name}</option>`).join('')
        }else{
            notification('No records retrieved for segment', 0)
        }
    }
}