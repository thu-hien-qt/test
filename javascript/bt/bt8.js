Array = Array();
Array.push(1);
Array.push(34);
Array.push(21);

result = Array[0];
for (i = 0; i < Array.length; i++)
{
    if (result < Array[i]) {
        result = Array[i];
    }
}

console.log(result);