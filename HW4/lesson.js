/*
Data types

undefined
null
boolean
number
string
Array
Object
Symbol

null, undefined, false, 0, "", NaN

var/let/const

for/while/do...while/for in/for of

*/

let a = 2;
let b = 5.67;
let c = "sdfsd";
let d = [];
let e = {};
let f = null;
let g = function(){

};

let obj = {
    qwerty: function(){},
    qwe: 67,
    3.4566: 456.78,
    [b]: 123,
    a, // a: a
    c // c: c
};

console.dir(obj);


let obj = {
    a: 10,
    b: [2,3,{
        c: 12,
    },7],
};

console.log(obj.b[2].c);


let a = 10;

function f() {
    let b = 10;

    function f2(){
        let e = 9;
        console.log(c);
    }

    f2();

    console.log(a);
}

f();

/*

EnvironmentRecord = {
    a: 10,
    f: {
        b: 10,
        f2: {
            e: 9,
            ref: f,
        },
        ref: global,
    },
    ref: null,
};

*/


let obj2 = {
    a: 10,
};

function f(obj) {
    obj.a++;
}

f(obj2);

console.log(obj2.a);


function f(){
    console.log(1);
}

window.f();
f();

var a = 9;

console.log(window.a);

let d = {
    f: function(){},
};

d.f();


let rectangle = {
    width: 100,
    height: 10,
    perimeter: function() {
        return (this.width + this.height) * 2;
    },
};

console.log(rectangle.perimeter());

rectangle.width = 9;

console.log(rectangle.perimeter());


function Rectangle(width, height) {
    this.width = width;
    this.height = height;

    this.perimeter = function() {
        return (this.width + this.height) * 2;
    };

    this.square = function(){
        return this.width * this.height;
    };
}

let rectangle = new window.Rectangle(10, 7);
console.dir(rectangle.square());


let obj2 = {
    k: 99,
};

let obj = {
    a: {
        g: 9,
    },
    b: 11,
    f33: {},
    proto: {
        c: 7,
        proto: {
            c: 56,
            f: 345,
            proto: obj2,
        },
    },
};
for(let item in obj){
    console.log(item);
}


function Rectangle(width, height) {
    this.width = width;
    this.height = height;
}

/*
Rectangle.prototype

{
    width: 10,
    height: 3,
    proto: Rectangle.prototype {
        constructor: Rectangle,
        square: function(){},
        perimeter: function(){},
        proto: {
            constructor: ddd,
            hasOwnProperty: function(string),
            proto: {
                proto: null,
            },
        },
    },
}
*/

Rectangle.prototype.perimeter = function(){
    return (this.width + this.height) * 2;
};

Rectangle.prototype.square = function(){
    return this.width * this.height;
};

let rectangle = new Rectangle(10, 7);
let rectangle2 = new Rectangle(10, 7);
console.dir(rectangle.hasOwnProperty());

let obj = {
    a: 10,
    proto: {
        b: 11,
    },
};
console.dir(obj);
console.log(obj.hasOwnProperty("a"));
console.log(obj.hasOwnProperty("b"));

/*
let rectangle = {
    width: 100,
    height: 10,

    perimeter: function() {
        return (this.width + this.height) * 2;
    },

    square: function(){
        return this.width * this.height;
    },
};
*/


function f(){
    console.log(234234);
}

f.asd = function(){
    console.log(typeof this);
    this();
};

console.dir(f.asd());


function fibonacci(limit, numbers) {
    numbers = numbers || [0, 1];

    if (limit === 0) {
        return [];
    }

    if (limit <= 2) {
        return numbers.slice(0, limit);
    }

    if(limit > numbers.length) {
        let nextNumber = [numbers[numbers.length - 1] + numbers[numbers.length - 2]];
        numbers = fibonacci(limit, numbers.concat(nextNumber));
    }

    return numbers;
}

console.dir(fibonacci(7));



