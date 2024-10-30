numbers = Array();
numbers.push(25);
numbers.push(5);

result = 0;
sum = 0;
for(i = 0; i < numbers.length; i++)
{
    sum += numbers[i];
}
result = sum / numbers.length;
console.log(result);