{
   "_id": "_design/count",
   "language": "javascript",
   "views": {
       "items_contributor": {
           "map": "function(doc) {\n  if (doc.Items) {\n    for (var i in doc.Items) {\n      emit(doc.Items[i].Contributor, 1);\n    }\n  }\n}",
           "reduce": "function (key, values, rereduce) {\n    return sum(values);\n}"
       },
       "items_contributor_1000": {
           "map": "function(doc) {\n  if (doc.Items) {\n    for (var i in doc.Items) {\n      var index = 0;\n      index = doc.Items[i].ItemID / 1000;\n      index = Math.round(index);\n      emit([index, doc.Items[i].Contributor], 1);\n    }\n  }\n}",
           "reduce": "function (key, values, rereduce) {\n    return sum(values);\n}"
       }
   }
}