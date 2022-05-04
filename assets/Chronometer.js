/**
 * The following content was designed & implemented under AlexSeif.com
 **/
class Chronometer {
    name = "";

    start() {
        console.log('I here you');
        const now = new Date();
        this.name = promt("What are you working on?", now.toDateString() + " " + now.toLocaleTimeString());
    }
}