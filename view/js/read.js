navUsers.addEventListener('click', openUsers);
function openUsers() {
    users.style.cssText = 'display: visible;';

    navUsers.addEventListener('click', closeUsers);
    function closeUsers() {
        users.style.cssText = 'display: none;';
    }
}

navDatabases.addEventListener('click', openDatabases);
function openDatabases() {
    databases.style.cssText = 'display: visible;';

    navDatabases.addEventListener('click', closeDatabases);
    function closeDatabases() {
        databases.style.cssText = 'display: none;';
    }
}