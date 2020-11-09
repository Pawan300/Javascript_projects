from flask import Flask
from flask import render_template

app = Flask(__name__, template_folder='templates')

@app.route('/stopwatch')
def index():
    return render_template('Stopwatch.html') 

if __name__ == '__main__':
    app.run(debug = True)