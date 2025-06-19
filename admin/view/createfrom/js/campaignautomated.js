function campaignautomatedActive() {
    const promptContainer = document.getElementById('prompt-container');
    const addPromptBtn = document.getElementById('add-prompt-btn');
    const params = JSON.parse(sessionStorage.getItem('c-params'))

    document.getElementById('option').innerHTML = ' '+params.campaignMedium+' '

    // Function to create a new prompt card
    function createPromptCard() {
        const existingCard = document.querySelector('.prompt-card');
        const newPrompt = existingCard.cloneNode(true);

        // Clear input values
        newPrompt.querySelectorAll('input, textarea').forEach(el => el.value = '');
        newPrompt.querySelector('.response-type').value = '';
        newPrompt.querySelectorAll('.dynamic-fields > div').forEach(el => el.classList.add('hidden'));

        return newPrompt;
    }

    // Add new prompt card
    addPromptBtn.addEventListener('click', () => {
        const newPrompt = createPromptCard();
        promptContainer.appendChild(newPrompt);
    });

    // Handle response type changes
    promptContainer.addEventListener('change', (e) => {
        if (e.target.classList.contains('response-type')) {
            handleResponseTypeChange(e.target);
        }
    });

    // Function to handle response type changes
    function handleResponseTypeChange(target) {
        const card = target.closest('.prompt-card');
        const type = target.value;

        // Hide all dynamic fields
        card.querySelectorAll('.dynamic-fields > div').forEach(el => el.classList.add('hidden'));

        // Show appropriate field based on selected type
        if (type === 'KEYWORD') {
            card.querySelector('.keyword-group').classList.remove('hidden');
        } else if (type === 'TEXT') {
            card.querySelector('.text-response-group').classList.remove('hidden');
        }
    }

    // Add new keyword field
    promptContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('add-keyword')) {
            addKeywordField(e.target);
        }
    });

    // Function to add a new keyword field
    function addKeywordField(button) {
        const keywordGroup = button.closest('.prompt-card').querySelector('.keyword-group');
        const newField = keywordGroup.querySelector('.keyworder').cloneNode(true);

        // Clear input values
        newField.querySelectorAll('input, textarea').forEach(el => el.value = '');

        keywordGroup.appendChild(newField);
    }

    // Remove elements
    promptContainer.addEventListener('click', (e) => {
        if (e.target.classList.contains('btn-remove')) {
            removeElement(e.target);
        }
    });

    // Function to remove elements
    function removeElement(target) {
        if (target.classList.contains('prompt-remove')) {
            if (document.querySelectorAll('.prompt-card').length > 1) {
                target.closest('.prompt-card').remove();
            }
        } else if (target.classList.contains('keyword-remove')) {
            const keyworderCount = target.closest('.keyword-group').querySelectorAll('.keyworder').length;

            if (keyworderCount === 1) {
                Swal.fire({
                    title: 'Cannot remove',
                    text: 'You cannot remove the last keyword.',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
                return;
            }

            target.closest('.keyworder').remove();
        }
    }

    // Form submission
    document.getElementById('prompt-form').addEventListener('submit', (e) => {
        e.preventDefault();

        // Collect form data
        const formData = [];
        promptContainer.querySelectorAll('.prompt-card').forEach(card => {
            const message = card.querySelector('.message').value.trim();
            const responseType = card.querySelector('.response-type').value;
            const expectedResponse = getExpectedResponse(card);

            if (message && responseType) {
                formData.push({ message, responseType, expectedResponse });
            }
        });

        console.log('Form submitted with data:', formData);
    });

    // Function to get expected response based on response type
    function getExpectedResponse(card) {
        if (card.querySelector('.response-type').value === 'KEYWORD') {
            return Array.from(card.querySelectorAll('.keyworder')).map(row => ({
                keyword: row.querySelector('.keyword').value.trim(),
                response: row.querySelector('.expected-response').value.trim()
            }));
        } else if (card.querySelector('.response-type').value === 'TEXT') {
            return card.querySelector('.text-response-group .expected-response').value.trim();
        }

        return null;
    }
}