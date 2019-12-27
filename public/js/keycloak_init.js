class KeycloakReady
{
    constructor()
    {
        this.authReady = false;
        this.readyQueue = [];
    }

    ready(callback)
    {
        this.readyQueue.push(callback);
        if(!this.authReady){
            return;
        }

        this.processReadyQueue();
    }

    processReadyQueue()
    {
        while(this.readyQueue.length){
            let callback = this.readyQueue.shift();
            callback.apply(null);
        }
    }

    onAuthSuccess()
    {
        this.authReady = true;
        this.processReadyQueue();
    }
}

const KEYCLOAK_READY = new KeycloakReady();

const KEYCLOAK = Keycloak('/keycloak.json');

console.log(KEYCLOAK);

KEYCLOAK.init({ onLoad: 'login-required' })
.error(() => alert('Failed to initialize auth system'));

KEYCLOAK.onAuthSuccess = () => KEYCLOAK_READY.onAuthSuccess();