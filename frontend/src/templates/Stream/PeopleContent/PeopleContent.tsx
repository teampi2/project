import Box from '@mui/material/Box'
import List from '@mui/material/List'
import ListItem from '@mui/material/ListItem'
import ListItemAvatar from '@mui/material/ListItemAvatar'
import ListItemText from '@mui/material/ListItemText'
import Avatar from '@mui/material/Avatar'
import Typography from '@mui/material/Typography'
import Divider from '@mui/material/Divider'

interface PeopleProps {
  name: string
  avatar?: string
}

function People({ name, avatar }: PeopleProps) {
  return (
    <ListItem>
      <ListItemAvatar>
        <Avatar src={avatar} sx={{ width: 32, height: 32 }} />
      </ListItemAvatar>
      <ListItemText primary={name} />
    </ListItem>
  )
}

export function PeopleContent() {
  const studentsLength = 21

  return (
    <Box maxWidth="md" marginInline="auto">
      <Typography variant="h5" component="div" sx={{ marginY: 2 }}>
        Professores
      </Typography>
      <Divider />
      <List>
        {[...Array(1)].map((index) => (
          <>
            <People key={index} name="Nome do(a) professora da turma" />
            <Divider />
          </>
        ))}
      </List>
      <Box
        sx={{ display: 'flex', justifyContent: 'space-between', mt: 4, mb: 2 }}
      >
        <Typography variant="h5" component="div">
          Colegas de turma
        </Typography>
        <Typography variant="body2" component="div">
          {studentsLength} estudantes
        </Typography>
      </Box>
      <Divider />
      <List>
        {[...Array(studentsLength)].map((_, index) => (
          <>
            <People key={index} name="Nome do(a) colega de turma" />
            <Divider />
          </>
        ))}
      </List>
    </Box>
  )
}
