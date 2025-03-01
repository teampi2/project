import React from 'react'
import Box from '@mui/material/Box'
import Avatar from '@mui/material/Avatar'
import TextField from '@mui/material/TextField'
import IconButton from '@mui/material/IconButton'
import SendIcon from '@mui/icons-material/Send'

interface CommentInputProps {
  onSend?: (text: string) => void
  avatarSrc?: string
}

const CommentInput: React.FC<CommentInputProps> = ({ onSend, avatarSrc }) => {
  const [comment, setComment] = React.useState('')

  const handleSend = () => {
    if (onSend && comment.trim()) {
      onSend(comment.trim())
    }
  }

  const handleKeyDown = (event: React.KeyboardEvent<HTMLDivElement>) => {
    if (event.key === 'Enter') {
      event.preventDefault()
      handleSend()
    }
  }

  return (
    <Box display="flex" alignItems="center" sx={{ width: '100%' }}>
      <Avatar src={avatarSrc} sx={{ width: 32, height: 32, mr: 2 }} />
      <TextField
        fullWidth
        size="small"
        variant="outlined"
        placeholder="Adicionar comentário para a turma..."
        onChange={(e) => setComment(e.target.value)}
        onKeyDown={handleKeyDown}
        sx={{
          flexGrow: 1,
          '& .MuiOutlinedInput-root': {
            borderRadius: 5,
            fontSize: 13,
          },
        }}
      />
      <IconButton onClick={handleSend} edge="end">
        <SendIcon />
      </IconButton>
    </Box>
  )
}

export default CommentInput
