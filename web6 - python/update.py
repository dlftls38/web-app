#!python
print("content-type: text/html\n")
import cgi, os, view
form = cgi.FieldStorage()
if 'id' in form:
    pageId = form["id"].value
    description = open('data/' + pageId, 'r').read()
else:
    pageId = 'Welcome'
    description = 'Hello, web'
print('''
<!DOCTYPE html>
<html>
    <head>
        <title>WEB2 - Python</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1><a href="index.py">Python</a></h1>
        <ol>
            {lists}
        </ol>
        <a href="create.py">create</a>
        <p>
            <form action="update_process.py" method="post">
                <input type="hidden" name="pageId" value="{form_default_title}">
                <p>
                    <input type="text" name="title" placeholder="title" value="{form_default_title}">
                </p>
                <p>
                    <textarea rows="4" name="description" placeholder="description">{form_default_description}</textarea>
                </p>
                <p>
                    <input type="submit">
                </p>
            </form>
        </p>
    </body>
</html>
'''.format(lists=view.getList(), title=pageId, desc=description, form_default_title=pageId, form_default_description=description))
