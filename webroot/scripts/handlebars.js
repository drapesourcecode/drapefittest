//Handlebar.js
var Handlebars = {};
Handlebars.VERSION = "1.0.beta.6";
Handlebars.helpers = {};
Handlebars.partials = {};
Handlebars.registerHelper = function(b, c, a) {
    if (a) {
        c.not = a;
    }
    this.helpers[b] = c;
};
Handlebars.registerPartial = function(a, b) {
    this.partials[a] = b;
};
Handlebars.registerHelper("helperMissing", function(a) {
    if (arguments.length === 2) {
        return undefined;
    } else {
        throw new Error("Could not find property '" + a + "'");
    }
});
var toString = Object.prototype.toString, functionType = "[object Function]";
Handlebars.registerHelper("blockHelperMissing", function(f, d) {
    var a = d.inverse || function() {
    }, h = d.fn;
    var c = "";
    var g = toString.call(f);
    if (g === functionType) {
        f = f.call(this);
    }
    if (f === true) {
        return h(this);
    } else {
        if (f === false || f == null) {
            return a(this);
        } else {
            if (g === "[object Array]") {
                if (f.length > 0) {
                    for (var e = 0, b = f.length; e < b; e++) {
                        c = c + h(f[e]);
                    }
                } else {
                    c = a(this);
                }
                return c;
            } else {
                return h(f);
            }
        }
    }
});
Handlebars.registerHelper("each", function(f, d) {
    var g = d.fn, a = d.inverse;
    var c = "";
    if (f && f.length > 0) {
        for (var e = 0, b = f.length; e < b; e++) {
            c = c + g(f[e]);
        }
    } else {
        c = a(this);
    }
    return c;
});
Handlebars.registerHelper("if", function(b, a) {
    var c = toString.call(b);
    if (c === functionType) {
        b = b.call(this);
    }
    if (!b || Handlebars.Utils.isEmpty(b)) {
        return a.inverse(this);
    } else {
        return a.fn(this);
    }
});
Handlebars.registerHelper("unless", function(c, b) {
    var d = b.fn, a = b.inverse;
    b.fn = a;
    b.inverse = d;
    return Handlebars.helpers["if"].call(this, c, b);
});
Handlebars.registerHelper("with", function(b, a) {
    return a.fn(b);
});
Handlebars.registerHelper("log", function(a) {
    Handlebars.log(a);
});
var handlebars = (function() {
    var f = {trace: function c() {
        }, yy: {}, symbols_: {error: 2, root: 3, program: 4, EOF: 5, statements: 6, simpleInverse: 7, statement: 8, openInverse: 9, closeBlock: 10, openBlock: 11, mustache: 12, partial: 13, CONTENT: 14, COMMENT: 15, OPEN_BLOCK: 16, inMustache: 17, CLOSE: 18, OPEN_INVERSE: 19, OPEN_ENDBLOCK: 20, path: 21, OPEN: 22, OPEN_UNESCAPED: 23, OPEN_PARTIAL: 24, params: 25, hash: 26, param: 27, STRING: 28, INTEGER: 29, BOOLEAN: 30, hashSegments: 31, hashSegment: 32, ID: 33, EQUALS: 34, pathSegments: 35, SEP: 36, "$accept": 0, "$end": 1}, terminals_: {2: "error", 5: "EOF", 14: "CONTENT", 15: "COMMENT", 16: "OPEN_BLOCK", 18: "CLOSE", 19: "OPEN_INVERSE", 20: "OPEN_ENDBLOCK", 22: "OPEN", 23: "OPEN_UNESCAPED", 24: "OPEN_PARTIAL", 28: "STRING", 29: "INTEGER", 30: "BOOLEAN", 33: "ID", 34: "EQUALS", 36: "SEP"}, productions_: [0, [3, 2], [4, 3], [4, 1], [4, 0], [6, 1], [6, 2], [8, 3], [8, 3], [8, 1], [8, 1], [8, 1], [8, 1], [11, 3], [9, 3], [10, 3], [12, 3], [12, 3], [13, 3], [13, 4], [7, 2], [17, 3], [17, 2], [17, 2], [17, 1], [25, 2], [25, 1], [27, 1], [27, 1], [27, 1], [27, 1], [26, 1], [31, 2], [31, 1], [32, 3], [32, 3], [32, 3], [32, 3], [21, 1], [35, 3], [35, 1]], performAction: function b(g, j, k, n, m, i, l) {
            var h = i.length - 1;
            switch (m) {
                case 1:
                    return i[h - 1];
                    break;
                case 2:
                    this.$ = new n.ProgramNode(i[h - 2], i[h]);
                    break;
                case 3:
                    this.$ = new n.ProgramNode(i[h]);
                    break;
                case 4:
                    this.$ = new n.ProgramNode([]);
                    break;
                case 5:
                    this.$ = [i[h]];
                    break;
                case 6:
                    i[h - 1].push(i[h]);
                    this.$ = i[h - 1];
                    break;
                case 7:
                    this.$ = new n.InverseNode(i[h - 2], i[h - 1], i[h]);
                    break;
                case 8:
                    this.$ = new n.BlockNode(i[h - 2], i[h - 1], i[h]);
                    break;
                case 9:
                    this.$ = i[h];
                    break;
                case 10:
                    this.$ = i[h];
                    break;
                case 11:
                    this.$ = new n.ContentNode(i[h]);
                    break;
                case 12:
                    this.$ = new n.CommentNode(i[h]);
                    break;
                case 13:
                    this.$ = new n.MustacheNode(i[h - 1][0], i[h - 1][1]);
                    break;
                case 14:
                    this.$ = new n.MustacheNode(i[h - 1][0], i[h - 1][1]);
                    break;
                case 15:
                    this.$ = i[h - 1];
                    break;
                case 16:
                    this.$ = new n.MustacheNode(i[h - 1][0], i[h - 1][1]);
                    break;
                case 17:
                    this.$ = new n.MustacheNode(i[h - 1][0], i[h - 1][1], true);
                    break;
                case 18:
                    this.$ = new n.PartialNode(i[h - 1]);
                    break;
                case 19:
                    this.$ = new n.PartialNode(i[h - 2], i[h - 1]);
                    break;
                case 20:
                    break;
                case 21:
                    this.$ = [[i[h - 2]].concat(i[h - 1]), i[h]];
                    break;
                case 22:
                    this.$ = [[i[h - 1]].concat(i[h]), null];
                    break;
                case 23:
                    this.$ = [[i[h - 1]], i[h]];
                    break;
                case 24:
                    this.$ = [[i[h]], null];
                    break;
                case 25:
                    i[h - 1].push(i[h]);
                    this.$ = i[h - 1];
                    break;
                case 26:
                    this.$ = [i[h]];
                    break;
                case 27:
                    this.$ = i[h];
                    break;
                case 28:
                    this.$ = new n.StringNode(i[h]);
                    break;
                case 29:
                    this.$ = new n.IntegerNode(i[h]);
                    break;
                case 30:
                    this.$ = new n.BooleanNode(i[h]);
                    break;
                case 31:
                    this.$ = new n.HashNode(i[h]);
                    break;
                case 32:
                    i[h - 1].push(i[h]);
                    this.$ = i[h - 1];
                    break;
                case 33:
                    this.$ = [i[h]];
                    break;
                case 34:
                    this.$ = [i[h - 2], i[h]];
                    break;
                case 35:
                    this.$ = [i[h - 2], new n.StringNode(i[h])];
                    break;
                case 36:
                    this.$ = [i[h - 2], new n.IntegerNode(i[h])];
                    break;
                case 37:
                    this.$ = [i[h - 2], new n.BooleanNode(i[h])];
                    break;
                case 38:
                    this.$ = new n.IdNode(i[h]);
                    break;
                case 39:
                    i[h - 2].push(i[h]);
                    this.$ = i[h - 2];
                    break;
                case 40:
                    this.$ = [i[h]];
                    break;
            }
        }, table: [{3: 1, 4: 2, 5: [2, 4], 6: 3, 8: 4, 9: 5, 11: 6, 12: 7, 13: 8, 14: [1, 9], 15: [1, 10], 16: [1, 12], 19: [1, 11], 22: [1, 13], 23: [1, 14], 24: [1, 15]}, {1: [3]}, {5: [1, 16]}, {5: [2, 3], 7: 17, 8: 18, 9: 5, 11: 6, 12: 7, 13: 8, 14: [1, 9], 15: [1, 10], 16: [1, 12], 19: [1, 19], 20: [2, 3], 22: [1, 13], 23: [1, 14], 24: [1, 15]}, {5: [2, 5], 14: [2, 5], 15: [2, 5], 16: [2, 5], 19: [2, 5], 20: [2, 5], 22: [2, 5], 23: [2, 5], 24: [2, 5]}, {4: 20, 6: 3, 8: 4, 9: 5, 11: 6, 12: 7, 13: 8, 14: [1, 9], 15: [1, 10], 16: [1, 12], 19: [1, 11], 20: [2, 4], 22: [1, 13], 23: [1, 14], 24: [1, 15]}, {4: 21, 6: 3, 8: 4, 9: 5, 11: 6, 12: 7, 13: 8, 14: [1, 9], 15: [1, 10], 16: [1, 12], 19: [1, 11], 20: [2, 4], 22: [1, 13], 23: [1, 14], 24: [1, 15]}, {5: [2, 9], 14: [2, 9], 15: [2, 9], 16: [2, 9], 19: [2, 9], 20: [2, 9], 22: [2, 9], 23: [2, 9], 24: [2, 9]}, {5: [2, 10], 14: [2, 10], 15: [2, 10], 16: [2, 10], 19: [2, 10], 20: [2, 10], 22: [2, 10], 23: [2, 10], 24: [2, 10]}, {5: [2, 11], 14: [2, 11], 15: [2, 11], 16: [2, 11], 19: [2, 11], 20: [2, 11], 22: [2, 11], 23: [2, 11], 24: [2, 11]}, {5: [2, 12], 14: [2, 12], 15: [2, 12], 16: [2, 12], 19: [2, 12], 20: [2, 12], 22: [2, 12], 23: [2, 12], 24: [2, 12]}, {17: 22, 21: 23, 33: [1, 25], 35: 24}, {17: 26, 21: 23, 33: [1, 25], 35: 24}, {17: 27, 21: 23, 33: [1, 25], 35: 24}, {17: 28, 21: 23, 33: [1, 25], 35: 24}, {21: 29, 33: [1, 25], 35: 24}, {1: [2, 1]}, {6: 30, 8: 4, 9: 5, 11: 6, 12: 7, 13: 8, 14: [1, 9], 15: [1, 10], 16: [1, 12], 19: [1, 11], 22: [1, 13], 23: [1, 14], 24: [1, 15]}, {5: [2, 6], 14: [2, 6], 15: [2, 6], 16: [2, 6], 19: [2, 6], 20: [2, 6], 22: [2, 6], 23: [2, 6], 24: [2, 6]}, {17: 22, 18: [1, 31], 21: 23, 33: [1, 25], 35: 24}, {10: 32, 20: [1, 33]}, {10: 34, 20: [1, 33]}, {18: [1, 35]}, {18: [2, 24], 21: 40, 25: 36, 26: 37, 27: 38, 28: [1, 41], 29: [1, 42], 30: [1, 43], 31: 39, 32: 44, 33: [1, 45], 35: 24}, {18: [2, 38], 28: [2, 38], 29: [2, 38], 30: [2, 38], 33: [2, 38], 36: [1, 46]}, {18: [2, 40], 28: [2, 40], 29: [2, 40], 30: [2, 40], 33: [2, 40], 36: [2, 40]}, {18: [1, 47]}, {18: [1, 48]}, {18: [1, 49]}, {18: [1, 50], 21: 51, 33: [1, 25], 35: 24}, {5: [2, 2], 8: 18, 9: 5, 11: 6, 12: 7, 13: 8, 14: [1, 9], 15: [1, 10], 16: [1, 12], 19: [1, 11], 20: [2, 2], 22: [1, 13], 23: [1, 14], 24: [1, 15]}, {14: [2, 20], 15: [2, 20], 16: [2, 20], 19: [2, 20], 22: [2, 20], 23: [2, 20], 24: [2, 20]}, {5: [2, 7], 14: [2, 7], 15: [2, 7], 16: [2, 7], 19: [2, 7], 20: [2, 7], 22: [2, 7], 23: [2, 7], 24: [2, 7]}, {21: 52, 33: [1, 25], 35: 24}, {5: [2, 8], 14: [2, 8], 15: [2, 8], 16: [2, 8], 19: [2, 8], 20: [2, 8], 22: [2, 8], 23: [2, 8], 24: [2, 8]}, {14: [2, 14], 15: [2, 14], 16: [2, 14], 19: [2, 14], 20: [2, 14], 22: [2, 14], 23: [2, 14], 24: [2, 14]}, {18: [2, 22], 21: 40, 26: 53, 27: 54, 28: [1, 41], 29: [1, 42], 30: [1, 43], 31: 39, 32: 44, 33: [1, 45], 35: 24}, {18: [2, 23]}, {18: [2, 26], 28: [2, 26], 29: [2, 26], 30: [2, 26], 33: [2, 26]}, {18: [2, 31], 32: 55, 33: [1, 56]}, {18: [2, 27], 28: [2, 27], 29: [2, 27], 30: [2, 27], 33: [2, 27]}, {18: [2, 28], 28: [2, 28], 29: [2, 28], 30: [2, 28], 33: [2, 28]}, {18: [2, 29], 28: [2, 29], 29: [2, 29], 30: [2, 29], 33: [2, 29]}, {18: [2, 30], 28: [2, 30], 29: [2, 30], 30: [2, 30], 33: [2, 30]}, {18: [2, 33], 33: [2, 33]}, {18: [2, 40], 28: [2, 40], 29: [2, 40], 30: [2, 40], 33: [2, 40], 34: [1, 57], 36: [2, 40]}, {33: [1, 58]}, {14: [2, 13], 15: [2, 13], 16: [2, 13], 19: [2, 13], 20: [2, 13], 22: [2, 13], 23: [2, 13], 24: [2, 13]}, {5: [2, 16], 14: [2, 16], 15: [2, 16], 16: [2, 16], 19: [2, 16], 20: [2, 16], 22: [2, 16], 23: [2, 16], 24: [2, 16]}, {5: [2, 17], 14: [2, 17], 15: [2, 17], 16: [2, 17], 19: [2, 17], 20: [2, 17], 22: [2, 17], 23: [2, 17], 24: [2, 17]}, {5: [2, 18], 14: [2, 18], 15: [2, 18], 16: [2, 18], 19: [2, 18], 20: [2, 18], 22: [2, 18], 23: [2, 18], 24: [2, 18]}, {18: [1, 59]}, {18: [1, 60]}, {18: [2, 21]}, {18: [2, 25], 28: [2, 25], 29: [2, 25], 30: [2, 25], 33: [2, 25]}, {18: [2, 32], 33: [2, 32]}, {34: [1, 57]}, {21: 61, 28: [1, 62], 29: [1, 63], 30: [1, 64], 33: [1, 25], 35: 24}, {18: [2, 39], 28: [2, 39], 29: [2, 39], 30: [2, 39], 33: [2, 39], 36: [2, 39]}, {5: [2, 19], 14: [2, 19], 15: [2, 19], 16: [2, 19], 19: [2, 19], 20: [2, 19], 22: [2, 19], 23: [2, 19], 24: [2, 19]}, {5: [2, 15], 14: [2, 15], 15: [2, 15], 16: [2, 15], 19: [2, 15], 20: [2, 15], 22: [2, 15], 23: [2, 15], 24: [2, 15]}, {18: [2, 34], 33: [2, 34]}, {18: [2, 35], 33: [2, 35]}, {18: [2, 36], 33: [2, 36]}, {18: [2, 37], 33: [2, 37]}], defaultActions: {16: [2, 1], 37: [2, 23], 53: [2, 21]}, parseError: function d(h, g) {
            throw new Error(h);
        }, parse: function e(o) {
            var x = this, l = [0], G = [null], s = [], H = this.table, h = "", q = 0, E = 0, j = 0, n = 2, u = 1;
            this.lexer.setInput(o);
            this.lexer.yy = this.yy;
            this.yy.lexer = this.lexer;
            if (typeof this.lexer.yylloc == "undefined") {
                this.lexer.yylloc = {};
            }
            var i = this.lexer.yylloc;
            s.push(i);
            if (typeof this.yy.parseError === "function") {
                this.parseError = this.yy.parseError;
            }
            function w(p) {
                l.length = l.length - 2 * p;
                G.length = G.length - p;
                s.length = s.length - p;
            }
            function v() {
                var p;
                p = x.lexer.lex() || 1;
                if (typeof p !== "number") {
                    p = x.symbols_[p] || p;
                }
                return p;
            }
            var D, z, k, C, I, t, B = {}, y, F, g, m;
            while (true) {
                k = l[l.length - 1];
                if (this.defaultActions[k]) {
                    C = this.defaultActions[k];
                } else {
                    if (D == null) {
                        D = v();
                    }
                    C = H[k] && H[k][D];
                }
                if (typeof C === "undefined" || !C.length || !C[0]) {
                    if (!j) {
                        m = [];
                        for (y in H[k]) {
                            if (this.terminals_[y] && y > 2) {
                                m.push("'" + this.terminals_[y] + "'");
                            }
                        }
                        var A = "";
                        if (this.lexer.showPosition) {
                            A = "Parse error on line " + (q + 1) + ":\n" + this.lexer.showPosition() + "\nExpecting " + m.join(", ") + ", got '" + this.terminals_[D] + "'";
                        } else {
                            A = "Parse error on line " + (q + 1) + ": Unexpected " + (D == 1 ? "end of input" : "'" + (this.terminals_[D] || D) + "'");
                        }
                        this.parseError(A, {text: this.lexer.match, token: this.terminals_[D] || D, line: this.lexer.yylineno, loc: i, expected: m});
                    }
                }
                if (C[0] instanceof Array && C.length > 1) {
                    throw new Error("Parse Error: multiple actions possible at state: " + k + ", token: " + D);
                }
                switch (C[0]) {
                    case 1:
                        l.push(D);
                        G.push(this.lexer.yytext);
                        s.push(this.lexer.yylloc);
                        l.push(C[1]);
                        D = null;
                        if (!z) {
                            E = this.lexer.yyleng;
                            h = this.lexer.yytext;
                            q = this.lexer.yylineno;
                            i = this.lexer.yylloc;
                            if (j > 0) {
                                j--;
                            }
                        } else {
                            D = z;
                            z = null;
                        }
                        break;
                    case 2:
                        F = this.productions_[C[1]][1];
                        B.$ = G[G.length - F];
                        B._$ = {first_line: s[s.length - (F || 1)].first_line, last_line: s[s.length - 1].last_line, first_column: s[s.length - (F || 1)].first_column, last_column: s[s.length - 1].last_column};
                        t = this.performAction.call(B, h, E, q, this.yy, C[1], G, s);
                        if (typeof t !== "undefined") {
                            return t;
                        }
                        if (F) {
                            l = l.slice(0, -1 * F * 2);
                            G = G.slice(0, -1 * F);
                            s = s.slice(0, -1 * F);
                        }
                        l.push(this.productions_[C[1]][0]);
                        G.push(B.$);
                        s.push(B._$);
                        g = H[l[l.length - 2]][l[l.length - 1]];
                        l.push(g);
                        break;
                    case 3:
                        return true;
                }
            }
            return true;
        }};
    var a = (function() {
        var j = ({EOF: 1, parseError: function l(o, n) {
                if (this.yy.parseError) {
                    this.yy.parseError(o, n);
                } else {
                    throw new Error(o);
                }
            }, setInput: function(n) {
                this._input = n;
                this._more = this._less = this.done = false;
                this.yylineno = this.yyleng = 0;
                this.yytext = this.matched = this.match = "";
                this.conditionStack = ["INITIAL"];
                this.yylloc = {first_line: 1, first_column: 0, last_line: 1, last_column: 0};
                return this;
            }, input: function() {
                var o = this._input[0];
                this.yytext += o;
                this.yyleng++;
                this.match += o;
                this.matched += o;
                var n = o.match(/\n/);
                if (n) {
                    this.yylineno++;
                }
                this._input = this._input.slice(1);
                return o;
            }, unput: function(n) {
                this._input = n + this._input;
                return this;
            }, more: function() {
                this._more = true;
                return this;
            }, pastInput: function() {
                var n = this.matched.substr(0, this.matched.length - this.match.length);
                return (n.length > 20 ? "..." : "") + n.substr(-20).replace(/\n/g, "");
            }, upcomingInput: function() {
                var n = this.match;
                if (n.length < 20) {
                    n += this._input.substr(0, 20 - n.length);
                }
                return (n.substr(0, 20) + (n.length > 20 ? "..." : "")).replace(/\n/g, "");
            }, showPosition: function() {
                var n = this.pastInput();
                var o = new Array(n.length + 1).join("-");
                return n + this.upcomingInput() + "\n" + o + "^";
            }, next: function() {
                if (this.done) {
                    return this.EOF;
                }
                if (!this._input) {
                    this.done = true;
                }
                var r, p, o, n;
                if (!this._more) {
                    this.yytext = "";
                    this.match = "";
                }
                var s = this._currentRules();
                for (var q = 0; q < s.length; q++) {
                    p = this._input.match(this.rules[s[q]]);
                    if (p) {
                        n = p[0].match(/\n.*/g);
                        if (n) {
                            this.yylineno += n.length;
                        }
                        this.yylloc = {first_line: this.yylloc.last_line, last_line: this.yylineno + 1, first_column: this.yylloc.last_column, last_column: n ? n[n.length - 1].length - 1 : this.yylloc.last_column + p[0].length};
                        this.yytext += p[0];
                        this.match += p[0];
                        this.matches = p;
                        this.yyleng = this.yytext.length;
                        this._more = false;
                        this._input = this._input.slice(p[0].length);
                        this.matched += p[0];
                        r = this.performAction.call(this, this.yy, this, s[q], this.conditionStack[this.conditionStack.length - 1]);
                        if (r) {
                            return r;
                        } else {
                            return;
                        }
                    }
                }
                if (this._input === "") {
                    return this.EOF;
                } else {
                    this.parseError("Lexical error on line " + (this.yylineno + 1) + ". Unrecognized text.\n" + this.showPosition(), {text: "", token: null, line: this.yylineno});
                }
            }, lex: function g() {
                var n = this.next();
                if (typeof n !== "undefined") {
                    return n;
                } else {
                    return this.lex();
                }
            }, begin: function h(n) {
                this.conditionStack.push(n);
            }, popState: function m() {
                return this.conditionStack.pop();
            }, _currentRules: function k() {
                return this.conditions[this.conditionStack[this.conditionStack.length - 1]].rules;
            }, topState: function() {
                return this.conditionStack[this.conditionStack.length - 2];
            }, pushState: function h(n) {
                this.begin(n);
            }});
        j.performAction = function i(r, o, q, n) {
            var p = n;
            switch (q) {
                case 0:
                    if (o.yytext.slice(-1) !== "\\") {
                        this.begin("mu");
                    }
                    if (o.yytext.slice(-1) === "\\") {
                        o.yytext = o.yytext.substr(0, o.yyleng - 1), this.begin("emu");
                    }
                    if (o.yytext) {
                        return 14;
                    }
                    break;
                case 1:
                    return 14;
                    break;
                case 2:
                    this.popState();
                    return 14;
                    break;
                case 3:
                    return 24;
                    break;
                case 4:
                    return 16;
                    break;
                case 5:
                    return 20;
                    break;
                case 6:
                    return 19;
                    break;
                case 7:
                    return 19;
                    break;
                case 8:
                    return 23;
                    break;
                case 9:
                    return 23;
                    break;
                case 10:
                    o.yytext = o.yytext.substr(3, o.yyleng - 5);
                    this.popState();
                    return 15;
                    break;
                case 11:
                    return 22;
                    break;
                case 12:
                    return 34;
                    break;
                case 13:
                    return 33;
                    break;
                case 14:
                    return 33;
                    break;
                case 15:
                    return 36;
                    break;
                case 16:
                    break;
                case 17:
                    this.popState();
                    return 18;
                    break;
                case 18:
                    this.popState();
                    return 18;
                    break;
                case 19:
                    o.yytext = o.yytext.substr(1, o.yyleng - 2).replace(/\\"/g, '"');
                    return 28;
                    break;
                case 20:
                    return 30;
                    break;
                case 21:
                    return 30;
                    break;
                case 22:
                    return 29;
                    break;
                case 23:
                    return 33;
                    break;
                case 24:
                    o.yytext = o.yytext.substr(1, o.yyleng - 2);
                    return 33;
                    break;
                case 25:
                    return "INVALID";
                    break;
                case 26:
                    return 5;
                    break;
            }
        };
        j.rules = [/^[^\x00]*?(?=(\{\{))/, /^[^\x00]+/, /^[^\x00]{2,}?(?=(\{\{))/, /^\{\{>/, /^\{\{#/, /^\{\{\//, /^\{\{\^/, /^\{\{\s*else\b/, /^\{\{\{/, /^\{\{&/, /^\{\{![\s\S]*?\}\}/, /^\{\{/, /^=/, /^\.(?=[} ])/, /^\.\./, /^[\/.]/, /^\s+/, /^\}\}\}/, /^\}\}/, /^"(\\["]|[^"])*"/, /^true(?=[}\s])/, /^false(?=[}\s])/, /^[0-9]+(?=[}\s])/, /^[a-zA-Z0-9_$-]+(?=[=}\s\/.])/, /^\[[^\]]*\]/, /^./, /^$/];
        j.conditions = {mu: {rules: [3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26], inclusive: false}, emu: {rules: [2], inclusive: false}, INITIAL: {rules: [0, 1, 26], inclusive: true}};
        return j;
    })();
    f.lexer = a;
    return f;
})();
if (typeof require !== "undefined" && typeof exports !== "undefined") {
    exports.parser = handlebars;
    exports.parse = function() {
        return handlebars.parse.apply(handlebars, arguments);
    };
    exports.main = function commonjsMain(a) {
        if (!a[1]) {
            throw new Error("Usage: " + a[0] + " FILE");
        }
        if (typeof process !== "undefined") {
            var c = require("fs").readFileSync(require("path").join(process.cwd(), a[1]), "utf8");
        } else {
            var b = require("file").path(require("file").cwd());
            var c = b.join(a[1]).read({charset: "utf-8"});
        }
        return exports.parser.parse(c);
    };
    if (typeof module !== "undefined" && require.main === module) {
        exports.main(typeof process !== "undefined" ? process.argv.slice(1) : require("system").args);
    }
}
Handlebars.Parser = handlebars;
Handlebars.parse = function(a) {
    Handlebars.Parser.yy = Handlebars.AST;
    return Handlebars.Parser.parse(a);
};
Handlebars.print = function(a) {
    return new Handlebars.PrintVisitor().accept(a);
};
Handlebars.logger = {DEBUG: 0, INFO: 1, WARN: 2, ERROR: 3, level: 3, log: function(b, a) {
    }};
Handlebars.log = function(b, a) {
    Handlebars.logger.log(b, a);
};
(function() {
    Handlebars.AST = {};
    Handlebars.AST.ProgramNode = function(c, b) {
        this.type = "program";
        this.statements = c;
        if (b) {
            this.inverse = new Handlebars.AST.ProgramNode(b);
        }
    };
    Handlebars.AST.MustacheNode = function(d, c, b) {
        this.type = "mustache";
        this.id = d[0];
        this.params = d.slice(1);
        this.hash = c;
        this.escaped = !b;
    };
    Handlebars.AST.PartialNode = function(c, b) {
        this.type = "partial";
        this.id = c;
        this.context = b;
    };
    var a = function(b, c) {
        if (b.original !== c.original) {
            throw new Handlebars.Exception(b.original + " doesn't match " + c.original);
        }
    };
    Handlebars.AST.BlockNode = function(c, b, d) {
        a(c.id, d);
        this.type = "block";
        this.mustache = c;
        this.program = b;
    };
    Handlebars.AST.InverseNode = function(c, b, d) {
        a(c.id, d);
        this.type = "inverse";
        this.mustache = c;
        this.program = b;
    };
    Handlebars.AST.ContentNode = function(b) {
        this.type = "content";
        this.string = b;
    };
    Handlebars.AST.HashNode = function(b) {
        this.type = "hash";
        this.pairs = b;
    };
    Handlebars.AST.IdNode = function(f) {
        this.type = "ID";
        this.original = f.join(".");
        var d = [], g = 0;
        for (var e = 0, b = f.length; e < b; e++) {
            var c = f[e];
            if (c === "..") {
                g++;
            } else {
                if (c === "." || c === "this") {
                    this.isScoped = true;
                } else {
                    d.push(c);
                }
            }
        }
        this.parts = d;
        this.string = d.join(".");
        this.depth = g;
        this.isSimple = (d.length === 1) && (g === 0);
    };
    Handlebars.AST.StringNode = function(b) {
        this.type = "STRING";
        this.string = b;
    };
    Handlebars.AST.IntegerNode = function(b) {
        this.type = "INTEGER";
        this.integer = b;
    };
    Handlebars.AST.BooleanNode = function(b) {
        this.type = "BOOLEAN";
        this.bool = b;
    };
    Handlebars.AST.CommentNode = function(b) {
        this.type = "comment";
        this.comment = b;
    };
})();
Handlebars.Exception = function(b) {
    var a = Error.prototype.constructor.apply(this, arguments);
    for (var c in a) {
        if (a.hasOwnProperty(c)) {
            this[c] = a[c];
        }
    }
    this.message = a.message;
};
Handlebars.Exception.prototype = new Error;
Handlebars.SafeString = function(a) {
    this.string = a;
};
Handlebars.SafeString.prototype.toString = function() {
    return this.string.toString();
};
(function() {
    var c = {"<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#x27;", "`": "&#x60;"};
    var d = /&(?!\w+;)|[<>"'`]/g;
    var b = /[&<>"'`]/;
    var a = function(e) {
        return c[e] || "&amp;";
    };
    Handlebars.Utils = {escapeExpression: function(e) {
            if (e instanceof Handlebars.SafeString) {
                return e.toString();
            } else {
                if (e == null || e === false) {
                    return "";
                }
            }
            if (!b.test(e)) {
                return e;
            }
            return e.replace(d, a);
        }, isEmpty: function(e) {
            if (typeof e === "undefined") {
                return true;
            } else {
                if (e === null) {
                    return true;
                } else {
                    if (e === false) {
                        return true;
                    } else {
                        if (Object.prototype.toString.call(e) === "[object Array]" && e.length === 0) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }
        }};
})();
Handlebars.Compiler = function() {
};
Handlebars.JavaScriptCompiler = function() {
};
(function(f, e) {
    f.OPCODE_MAP = {appendContent: 1, getContext: 2, lookupWithHelpers: 3, lookup: 4, append: 5, invokeMustache: 6, appendEscaped: 7, pushString: 8, truthyOrFallback: 9, functionOrFallback: 10, invokeProgram: 11, invokePartial: 12, push: 13, assignToHash: 15, pushStringParam: 16};
    f.MULTI_PARAM_OPCODES = {appendContent: 1, getContext: 1, lookupWithHelpers: 2, lookup: 1, invokeMustache: 3, pushString: 1, truthyOrFallback: 1, functionOrFallback: 1, invokeProgram: 3, invokePartial: 1, push: 1, assignToHash: 1, pushStringParam: 1};
    f.DISASSEMBLE_MAP = {};
    for (var h in f.OPCODE_MAP) {
        var g = f.OPCODE_MAP[h];
        f.DISASSEMBLE_MAP[g] = h;
    }
    f.multiParamSize = function(i) {
        return f.MULTI_PARAM_OPCODES[f.DISASSEMBLE_MAP[i]];
    };
    f.prototype = {compiler: f, disassemble: function() {
            var t = this.opcodes, r, n;
            var q = [], v, m, w;
            for (var s = 0, o = t.length; s < o; s++) {
                r = t[s];
                if (r === "DECLARE") {
                    m = t[++s];
                    w = t[++s];
                    q.push("DECLARE " + m + " = " + w);
                } else {
                    v = f.DISASSEMBLE_MAP[r];
                    var u = f.multiParamSize(r);
                    var k = [];
                    for (var p = 0; p < u; p++) {
                        n = t[++s];
                        if (typeof n === "string") {
                            n = '"' + n.replace("\n", "\\n") + '"';
                        }
                        k.push(n);
                    }
                    v = v + " " + k.join(" ");
                    q.push(v);
                }
            }
            return q.join("\n");
        }, guid: 0, compile: function(i, k) {
            this.children = [];
            this.depths = {list: []};
            this.options = k;
            var l = this.options.knownHelpers;
            this.options.knownHelpers = {helperMissing: true, blockHelperMissing: true, each: true, "if": true, unless: true, "with": true, log: true};
            if (l) {
                for (var j in l) {
                    this.options.knownHelpers[j] = l[j];
                }
            }
            return this.program(i);
        }, accept: function(i) {
            return this[i.type](i);
        }, program: function(m) {
            var k = m.statements, o;
            this.opcodes = [];
            for (var n = 0, j = k.length; n < j; n++) {
                o = k[n];
                this[o.type](o);
            }
            this.isSimple = j === 1;
            this.depths.list = this.depths.list.sort(function(l, i) {
                return l - i;
            });
            return this;
        }, compileProgram: function(m) {
            var j = new this.compiler().compile(m, this.options);
            var n = this.guid++;
            this.usePartial = this.usePartial || j.usePartial;
            this.children[n] = j;
            for (var o = 0, k = j.depths.list.length; o < k; o++) {
                depth = j.depths.list[o];
                if (depth < 2) {
                    continue;
                } else {
                    this.addDepth(depth - 1);
                }
            }
            return n;
        }, block: function(o) {
            var l = o.mustache;
            var n, p, j, k;
            var m = this.setupStackForMustache(l);
            var i = this.compileProgram(o.program);
            if (o.program.inverse) {
                k = this.compileProgram(o.program.inverse);
                this.declare("inverse", k);
            }
            this.opcode("invokeProgram", i, m.length, !!l.hash);
            this.declare("inverse", null);
            this.opcode("append");
        }, inverse: function(k) {
            var j = this.setupStackForMustache(k.mustache);
            var i = this.compileProgram(k.program);
            this.declare("inverse", i);
            this.opcode("invokeProgram", null, j.length, !!k.mustache.hash);
            this.declare("inverse", null);
            this.opcode("append");
        }, hash: function(n) {
            var m = n.pairs, p, o;
            this.opcode("push", "{}");
            for (var k = 0, j = m.length; k < j; k++) {
                p = m[k];
                o = p[1];
                this.accept(o);
                this.opcode("assignToHash", p[0]);
            }
        }, partial: function(i) {
            var j = i.id;
            this.usePartial = true;
            if (i.context) {
                this.ID(i.context);
            } else {
                this.opcode("push", "depth0");
            }
            this.opcode("invokePartial", j.original);
            this.opcode("append");
        }, content: function(i) {
            this.opcode("appendContent", i.string);
        }, mustache: function(i) {
            var j = this.setupStackForMustache(i);
            this.opcode("invokeMustache", j.length, i.id.original, !!i.hash);
            if (i.escaped && !this.options.noEscape) {
                this.opcode("appendEscaped");
            } else {
                this.opcode("append");
            }
        }, ID: function(m) {
            this.addDepth(m.depth);
            this.opcode("getContext", m.depth);
            this.opcode("lookupWithHelpers", m.parts[0] || null, m.isScoped || false);
            for (var k = 1, j = m.parts.length; k < j; k++) {
                this.opcode("lookup", m.parts[k]);
            }
        }, STRING: function(i) {
            this.opcode("pushString", i.string);
        }, INTEGER: function(i) {
            this.opcode("push", i.integer);
        }, BOOLEAN: function(i) {
            this.opcode("push", i.bool);
        }, comment: function() {
        }, pushParams: function(l) {
            var j = l.length, k;
            while (j--) {
                k = l[j];
                if (this.options.stringParams) {
                    if (k.depth) {
                        this.addDepth(k.depth);
                    }
                    this.opcode("getContext", k.depth || 0);
                    this.opcode("pushStringParam", k.string);
                } else {
                    this[k.type](k);
                }
            }
        }, opcode: function(i, l, k, j) {
            this.opcodes.push(f.OPCODE_MAP[i]);
            if (l !== undefined) {
                this.opcodes.push(l);
            }
            if (k !== undefined) {
                this.opcodes.push(k);
            }
            if (j !== undefined) {
                this.opcodes.push(j);
            }
        }, declare: function(i, j) {
            this.opcodes.push("DECLARE");
            this.opcodes.push(i);
            this.opcodes.push(j);
        }, addDepth: function(i) {
            if (i === 0) {
                return;
            }
            if (!this.depths[i]) {
                this.depths[i] = true;
                this.depths.list.push(i);
            }
        }, setupStackForMustache: function(i) {
            var j = i.params;
            this.pushParams(j);
            if (i.hash) {
                this.hash(i.hash);
            }
            this.ID(i.id);
            return j;
        }};
    e.prototype = {nameLookup: function(k, i, j) {
            if (/^[0-9]+$/.test(i)) {
                return k + "[" + i + "]";
            } else {
                if (e.isValidJavaScriptVariableName(i)) {
                    return k + "." + i;
                } else {
                    return k + "['" + i + "']";
                }
            }
        }, appendToBuffer: function(i) {
            if (this.environment.isSimple) {
                return "return " + i + ";";
            } else {
                return "buffer += " + i + ";";
            }
        }, initializeBuffer: function() {
            return this.quotedString("");
        }, namespace: "Handlebars", compile: function(i, j, l, k) {
            this.environment = i;
            this.options = j || {};
            this.name = this.environment.name;
            this.isChild = !!l;
            this.context = l || {programs: [], aliases: {self: "this"}, registers: {list: []}};
            this.preamble();
            this.stackSlot = 0;
            this.stackVars = [];
            this.compileChildren(i, j);
            var n = i.opcodes, m;
            this.i = 0;
            for (b = n.length; this.i < b; this.i++) {
                m = this.nextOpcode(0);
                if (m[0] === "DECLARE") {
                    this.i = this.i + 2;
                    this[m[1]] = m[2];
                } else {
                    this.i = this.i + m[1].length;
                    this[m[0]].apply(this, m[1]);
                }
            }
            return this.createFunctionContext(k);
        }, nextOpcode: function(r) {
            var o = this.environment.opcodes, m = o[this.i + r], l, p;
            var q, i;
            if (m === "DECLARE") {
                l = o[this.i + 1];
                p = o[this.i + 2];
                return ["DECLARE", l, p];
            } else {
                l = f.DISASSEMBLE_MAP[m];
                q = f.multiParamSize(m);
                i = [];
                for (var k = 0; k < q; k++) {
                    i.push(o[this.i + k + 1 + r]);
                }
                return [l, i];
            }
        }, eat: function(i) {
            this.i = this.i + i.length;
        }, preamble: function() {
            var i = [];
            this.useRegister("foundHelper");
            if (!this.isChild) {
                var j = this.namespace;
                var k = "helpers = helpers || " + j + ".helpers;";
                if (this.environment.usePartial) {
                    k = k + " partials = partials || " + j + ".partials;";
                }
                i.push(k);
            } else {
                i.push("");
            }
            if (!this.environment.isSimple) {
                i.push(", buffer = " + this.initializeBuffer());
            } else {
                i.push("");
            }
            this.lastContext = 0;
            this.source = i;
        }, createFunctionContext: function(p) {
            var q = this.stackVars;
            if (!this.isChild) {
                q = q.concat(this.context.registers.list);
            }
            if (q.length > 0) {
                this.source[1] = this.source[1] + ", " + q.join(", ");
            }
            if (!this.isChild) {
                var k = [];
                for (var o in this.context.aliases) {
                    this.source[1] = this.source[1] + ", " + o + "=" + this.context.aliases[o];
                }
            }
            if (this.source[1]) {
                this.source[1] = "var " + this.source[1].substring(2) + ";";
            }
            if (!this.isChild) {
                this.source[1] += "\n" + this.context.programs.join("\n") + "\n";
            }
            if (!this.environment.isSimple) {
                this.source.push("return buffer;");
            }
            var r = this.isChild ? ["depth0", "data"] : ["Handlebars", "depth0", "helpers", "partials", "data"];
            for (var n = 0, j = this.environment.depths.list.length; n < j; n++) {
                r.push("depth" + this.environment.depths.list[n]);
            }
            if (p) {
                r.push(this.source.join("\n  "));
                return Function.apply(this, r);
            } else {
                var m = "function " + (this.name || "") + "(" + r.join(",") + ") {\n  " + this.source.join("\n  ") + "}";
                Handlebars.log(Handlebars.logger.DEBUG, m + "\n\n");
                return m;
            }
        }, appendContent: function(i) {
            this.source.push(this.appendToBuffer(this.quotedString(i)));
        }, append: function() {
            var i = this.popStack();
            this.source.push("if(" + i + " || " + i + " === 0) { " + this.appendToBuffer(i) + " }");
            if (this.environment.isSimple) {
                this.source.push("else { " + this.appendToBuffer("''") + " }");
            }
        }, appendEscaped: function() {
            var j = this.nextOpcode(1), i = "";
            this.context.aliases.escapeExpression = "this.escapeExpression";
            if (j[0] === "appendContent") {
                i = " + " + this.quotedString(j[1][0]);
                this.eat(j);
            }
            this.source.push(this.appendToBuffer("escapeExpression(" + this.popStack() + ")" + i));
        }, getContext: function(i) {
            if (this.lastContext !== i) {
                this.lastContext = i;
            }
        }, lookupWithHelpers: function(k, l) {
            if (k) {
                var i = this.nextStack();
                this.usingKnownHelper = false;
                var j;
                if (!l && this.options.knownHelpers[k]) {
                    j = i + " = " + this.nameLookup("helpers", k, "helper");
                    this.usingKnownHelper = true;
                } else {
                    if (l || this.options.knownHelpersOnly) {
                        j = i + " = " + this.nameLookup("depth" + this.lastContext, k, "context");
                    } else {
                        this.register("foundHelper", this.nameLookup("helpers", k, "helper"));
                        j = i + " = foundHelper || " + this.nameLookup("depth" + this.lastContext, k, "context");
                    }
                }
                j += ";";
                this.source.push(j);
            } else {
                this.pushStack("depth" + this.lastContext);
            }
        }, lookup: function(j) {
            var i = this.topStack();
            this.source.push(i + " = (" + i + " === null || " + i + " === undefined || " + i + " === false ? " + i + " : " + this.nameLookup(i, j, "context") + ");");
        }, pushStringParam: function(i) {
            this.pushStack("depth" + this.lastContext);
            this.pushString(i);
        }, pushString: function(i) {
            this.pushStack(this.quotedString(i));
        }, push: function(i) {
            this.pushStack(i);
        }, invokeMustache: function(k, j, i) {
            this.populateParams(k, this.quotedString(j), "{}", null, i, function(l, n, m) {
                if (!this.usingKnownHelper) {
                    this.context.aliases.helperMissing = "helpers.helperMissing";
                    this.context.aliases.undef = "void 0";
                    this.source.push("else if(" + m + "=== undef) { " + l + " = helperMissing.call(" + n + "); }");
                    if (l !== m) {
                        this.source.push("else { " + l + " = " + m + "; }");
                    }
                }
            });
        }, invokeProgram: function(k, l, j) {
            var i = this.programExpression(this.inverse);
            var m = this.programExpression(k);
            this.populateParams(l, null, m, i, j, function(n, p, o) {
                if (!this.usingKnownHelper) {
                    this.context.aliases.blockHelperMissing = "helpers.blockHelperMissing";
                    this.source.push("else { " + n + " = blockHelperMissing.call(" + p + "); }");
                }
            });
        }, populateParams: function(p, k, t, q, x, w) {
            var l = x || this.options.stringParams || q || this.options.data;
            var j = this.popStack(), v;
            var n = [], m, o, u;
            if (l) {
                this.register("tmp1", t);
                u = "tmp1";
            } else {
                u = "{ hash: {} }";
            }
            if (l) {
                var s = (x ? this.popStack() : "{}");
                this.source.push("tmp1.hash = " + s + ";");
            }
            if (this.options.stringParams) {
                this.source.push("tmp1.contexts = [];");
            }
            for (var r = 0; r < p; r++) {
                m = this.popStack();
                n.push(m);
                if (this.options.stringParams) {
                    this.source.push("tmp1.contexts.push(" + this.popStack() + ");");
                }
            }
            if (q) {
                this.source.push("tmp1.fn = tmp1;");
                this.source.push("tmp1.inverse = " + q + ";");
            }
            if (this.options.data) {
                this.source.push("tmp1.data = data;");
            }
            n.push(u);
            this.populateCall(n, j, k || j, w, t !== "{}");
        }, populateCall: function(n, j, k, q, o) {
            var m = ["depth0"].concat(n).join(", ");
            var i = ["depth0"].concat(k).concat(n).join(", ");
            var p = this.nextStack();
            if (this.usingKnownHelper) {
                this.source.push(p + " = " + j + ".call(" + m + ");");
            } else {
                this.context.aliases.functionType = '"function"';
                var l = o ? "foundHelper && " : "";
                this.source.push("if(" + l + "typeof " + j + " === functionType) { " + p + " = " + j + ".call(" + m + "); }");
            }
            q.call(this, p, i, j);
            this.usingKnownHelper = false;
        }, invokePartial: function(i) {
            params = [this.nameLookup("partials", i, "partial"), "'" + i + "'", this.popStack(), "helpers", "partials"];
            if (this.options.data) {
                params.push("data");
            }
            this.pushStack("self.invokePartial(" + params.join(", ") + ");");
        }, assignToHash: function(i) {
            var j = this.popStack();
            var k = this.topStack();
            this.source.push(k + "['" + i + "'] = " + j + ";");
        }, compiler: e, compileChildren: function(j, n) {
            var p = j.children, r, q;
            for (var o = 0, k = p.length; o < k; o++) {
                r = p[o];
                q = new this.compiler();
                this.context.programs.push("");
                var m = this.context.programs.length;
                r.index = m;
                r.name = "program" + m;
                this.context.programs[m] = q.compile(r, n, this.context);
            }
        }, programExpression: function(k) {
            if (k == null) {
                return "self.noop";
            }
            var p = this.environment.children[k], o = p.depths.list;
            var n = [p.index, p.name, "data"];
            for (var m = 0, j = o.length; m < j; m++) {
                depth = o[m];
                if (depth === 1) {
                    n.push("depth0");
                } else {
                    n.push("depth" + (depth - 1));
                }
            }
            if (o.length === 0) {
                return "self.program(" + n.join(", ") + ")";
            } else {
                n.shift();
                return "self.programWithDepth(" + n.join(", ") + ")";
            }
        }, register: function(i, j) {
            this.useRegister(i);
            this.source.push(i + " = " + j + ";");
        }, useRegister: function(i) {
            if (!this.context.registers[i]) {
                this.context.registers[i] = true;
                this.context.registers.list.push(i);
            }
        }, pushStack: function(i) {
            this.source.push(this.nextStack() + " = " + i + ";");
            return "stack" + this.stackSlot;
        }, nextStack: function() {
            this.stackSlot++;
            if (this.stackSlot > this.stackVars.length) {
                this.stackVars.push("stack" + this.stackSlot);
            }
            return "stack" + this.stackSlot;
        }, popStack: function() {
            return "stack" + this.stackSlot--;
        }, topStack: function() {
            return "stack" + this.stackSlot;
        }, quotedString: function(i) {
            return '"' + i.replace(/\\/g, "\\\\").replace(/"/g, '\\"').replace(/\n/g, "\\n").replace(/\r/g, "\\r") + '"';
        }};
    var a = ("break else new var case finally return void catch for switch while continue function this with default if throw delete in try do instanceof typeof abstract enum int short boolean export interface static byte extends long super char final native synchronized class float package throws const goto private transient debugger implements protected volatile double import public let yield").split(" ");
    var d = e.RESERVED_WORDS = {};
    for (var c = 0, b = a.length; c < b; c++) {
        d[a[c]] = true;
    }
    e.isValidJavaScriptVariableName = function(i) {
        if (!e.RESERVED_WORDS[i] && /^[a-zA-Z_$][0-9a-zA-Z_$]+$/.test(i)) {
            return true;
        }
        return false;
    };
})(Handlebars.Compiler, Handlebars.JavaScriptCompiler);
Handlebars.precompile = function(d, c) {
    c = c || {};
    var b = Handlebars.parse(d);
    var a = new Handlebars.Compiler().compile(b, c);
    return new Handlebars.JavaScriptCompiler().compile(a, c);
};
Handlebars.compile = function(b, a) {
    a = a || {};
    var d;
    function c() {
        var g = Handlebars.parse(b);
        var f = new Handlebars.Compiler().compile(g, a);
        var e = new Handlebars.JavaScriptCompiler().compile(f, a, undefined, true);
        return Handlebars.template(e);
    }
    return function(f, e) {
        if (!d) {
            d = c();
        }
        return d.call(this, f, e);
    };
};
Handlebars.VM = {template: function(a) {
        var b = {escapeExpression: Handlebars.Utils.escapeExpression, invokePartial: Handlebars.VM.invokePartial, programs: [], program: function(d, e, f) {
                var c = this.programs[d];
                if (f) {
                    return Handlebars.VM.program(e, f);
                } else {
                    if (c) {
                        return c;
                    } else {
                        c = this.programs[d] = Handlebars.VM.program(e);
                        return c;
                    }
                }
            }, programWithDepth: Handlebars.VM.programWithDepth, noop: Handlebars.VM.noop};
        return function(d, c) {
            c = c || {};
            return a.call(b, Handlebars, d, c.helpers, c.partials, c.data);
        };
    }, programWithDepth: function(b, d, c) {
        var a = Array.prototype.slice.call(arguments, 2);
        return function(f, e) {
            e = e || {};
            return b.apply(this, [f, e.data || d].concat(a));
        };
    }, program: function(a, b) {
        return function(d, c) {
            c = c || {};
            return a(d, c.data || b);
        };
    }, noop: function() {
        return "";
    }, invokePartial: function(a, b, d, e, c, f) {
        options = {helpers: e, partials: c, data: f};
        if (a === undefined) {
            throw new Handlebars.Exception("The partial " + b + " could not be found");
        } else {
            if (a instanceof Function) {
                return a(d, options);
            } else {
                if (!Handlebars.compile) {
                    throw new Handlebars.Exception("The partial " + b + " could not be compiled when running in runtime-only mode");
                } else {
                    c[b] = Handlebars.compile(a);
                    return c[b](d, options);
                }
            }
        }
    }};
Handlebars.template = Handlebars.VM.template;
