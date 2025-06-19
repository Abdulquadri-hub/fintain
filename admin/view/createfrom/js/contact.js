async function contactActive() {
    document.querySelector('button#submit').addEventListener('click', function() {
        createContact(this)
    })
    await getAllSegments('segment')

    new TomSelect('#segment', {
        plugins: ['remove_button']
    })
} 




