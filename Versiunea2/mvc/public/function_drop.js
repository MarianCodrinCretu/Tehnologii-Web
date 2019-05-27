function dropDownInc()
{
var array_classes = document.getElementsByClassName('dropdownJava');
var number = array_classes.length;
for (var i = 0; i<= number; i++)  
{document.getElementsByClassName('dropdownJava')[i].innerHTML = dropDown();}
//document.getElementsByClassName("dropdown").innerHTML = dropDown();
// document.write(dropDown());
}



function dropDown(){
    var start = 1;                                                                                 
    var arr = document.getElementsByClassName("movie");
    var today = arr.length;
    var html = [];  
    html.push('<select name = "movie_parts">');

    for (var i = start ; i <= today; i++) {
    string = '<option value=part_{0}>'.format(i) + 'Part {0}'.format(i) + '</option>';
    html.push(string);
	}
    html.push('</select>');
    return html.join("");
}

String.prototype.format = function () {
        var a = this;
        for (var k in arguments) {
            a = a.replace(new RegExp("\\{" + k + "\\}", 'g'), arguments[k]);
        }
        return a
    }

//dropDown();

function addScen()
{
  
var nr_of_urls = document.getElementsByClassName('upload_info').length;
var nr_of_questions = document.getElementsByClassName('question_info').length;
var nr_of_responses = document.getElementsByClassName('response').length;
var newNode = document.createElement('div');
newNode.className = 'response';
newNode.innerHTML = `
    <label for="scenario_{0}_{1}"><span id='Scenario_{0}_{1}'>Scenario {2}:<br/></span></label>
              <input type="text" id="scenario_{0}_{1}" required>              
              <select name="movie_parts">
                <option value="part_1">Part 1</option>
              </select>
              <br/><br/><br/>
 `.format(nr_of_urls, nr_of_responses+1, nr_of_responses+1);

var existingNode = document.getElementsByName("add_scen")[nr_of_urls-1];
console.log(existingNode);
// document.getElementsByClassName('question_info')[nr_of_urls-1].appendChild(newNode);
document.getElementsByClassName('question_info')[nr_of_urls-1].insertBefore(existingNode, newNode);


var parts = document.getElementsByName('movie_parts');

var nr_of_urls_new = document.getElementsByClassName('upload_info').length;
console.log(nr_of_urls_new);
var number = parts.length;
for (var i = 0; i < number-1; i++)  
{
parts[i].options[parts[i].options.length] = new Option('Part {0}'.format(nr_of_urls+1), 'part_{0}'.format(nr_of_urls+1));
}
for(j=1; j<=nr_of_urls; j++)
{
parts[number-1].options[parts[number-1].options.length] = new Option('Part {0}'.format(j+1), 'part_{0}'.format(j+1));
}

}

function addPart()
{


var nr_of_urls = document.getElementsByClassName('upload_info').length;
var nr_of_questions = document.getElementsByClassName('question_info').length;
var nr_of_responses = document.getElementsByClassName('response').length;

var newNode = document.createElement('div');
newNode.className = 'movie';
newNode.innerHTML = `
          <div class="upload_info">
            
            <label for="url_{0}"><span id='Movie_url_{0}'>Movie url:<br/></span></label>
            <input type="text" name="url{0}" id="url_{0}" required><br/><br/>
            
          </div>
          <div class="question_info">
            <label for="question_q_{1}"><span id='Question_q_{1}'>Question:<br/></span></label>
            <input type="text" name="intrebare{1}" id="question_q_{1}" required><br/><br/>
            <div class="response">
              <label for="scenario_{1}_1"><span id='Scenario_{1}_1'>Scenario 1:<br/></span></label>
              <input type="text" name="scenariu_{1}_1" id="scenario_{1}_1" required>
             
              <select name="movie_parts_{1}_1">
                <option value="part_1">Part 1</option>
              </select>
              <br/><br/><br/>
            </div>
            <div class="response">
              <label for="scenario_{1}_2"><span id='Scenario_{1}_2'>Scenario 2:<br/></span></label>
              <input type="text" name="scenariu_{1}_2" id="scenario_{1}_2" required>
             
              <select name="movie_parts_{1}_2">
                <option value="part_1">Part 1</option>
              </select>
              <br/><br/><br/>
            </div>
            <div class="response">
              <label for="scenario_{1}_3"><span id='Scenario_{1}_3'>Scenario 3:<br/></span></label>
              <input type="text" name="scenariu_{1}_3" id="scenario_{1}_3" required>
             
              <select name="movie_parts_{1}_3">
                <option value="part_1">Part 1</option>
              </select>
              <br/><br/><br/>
            </div>
            <div class="response">
              <label for="scenario_{1}_4"><span id='Scenario_{1}_4'>Scenario 4:<br/></span></label>
              <input type="text" name="scenariu_{1}_4" id="scenario_{1}_4" required>
             
              <select name="movie_parts_{1}_4">
                <option value="part_1">Part 1</option>
              </select>
              <br/><br/><br/>
            </div>
          </div>
          `.format(String(nr_of_urls + 1), String(nr_of_questions + 1), String(nr_of_responses + 1));

document.getElementsByClassName('card')[0].appendChild(newNode);

var parts = document.getElementsByTagName('SELECT');

var nr_of_urls_new = document.getElementsByClassName('upload_info').length;
console.log(nr_of_urls_new);
var number = parts.length;
for (var i = 0; i < number-1; i++)  
{
parts[i].options[parts[i].options.length] = new Option('Part {0}'.format(nr_of_urls+1), 'part_{0}'.format(nr_of_urls+1));
}
for(j=1; j<=nr_of_urls; j++)
{
parts[number-1].options[parts[number-1].options.length] = new Option('Part {0}'.format(j+1), 'part_{0}'.format(j+1));

// parts[number-2].options[parts[number-2].options.length] = new Option('Part {0}'.format(j+1), 'part_{0}'.format(j+1));
// parts[number-1].options[parts[number-1].options.length] = new Option('Part {0}'.format(j+1), 'part_{0}'.format(j+1));

}
// array_class.classList.add("movie");
parts[number-2].innerHTML = parts[number-1].innerHTML;
parts[number-3].innerHTML = parts[number-1].innerHTML;
parts[number-4].innerHTML = parts[number-1].innerHTML;

}












